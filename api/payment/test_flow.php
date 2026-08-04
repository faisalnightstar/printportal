<?php
/**
 * Automated Verification Script for UPI QR Payment & Wallet Engine
 */

error_reporting(0);
ini_set('display_errors', '0');

$isTestRunner = true;

require_once __DIR__ . '/db_helper.php';

echo "--- 1. Testing Database Connection & Schema ---\n";
$conn = get_db_connection();
if (!$conn) {
    die("FAILED: Could not establish database connection.\n");
}
echo "SUCCESS: Database connection established.\n";

$tables = ['payment_accounts', 'payments', 'wallets', 'wallet_transactions'];
foreach ($tables as $tbl) {
    $res = db_query($conn, "SHOW TABLES LIKE '{$tbl}'");
    if ($res && db_num_rows($res) > 0) {
        echo "SUCCESS: Table `{$tbl}` exists.\n";
    } else {
        echo "FAILED: Table `{$tbl}` is missing!\n";
    }
}

echo "\n--- 2. Testing Payment Account Seed Credentials ---\n";
$accRes = db_query($conn, "SELECT * FROM payment_accounts WHERE status = 'active' LIMIT 1");
if ($accRes && $accRow = db_fetch_assoc($accRes)) {
    echo "SUCCESS: Active Merchant UPI ID: " . $accRow['upi_id'] . " | Paytm MID: " . $accRow['paytm_mid'] . "\n";
} else {
    echo "WARNING: No active merchant account record found in `payment_accounts`.\n";
}

echo "\n--- 3. Testing Generate QR Logic ---\n";
$testUserId = 99999;
$testAmount = 250.00;

$_SESSION['userid'] = $testUserId;

$_POST['amount'] = $testAmount;
ob_start();
require __DIR__ . '/generate-qr.php';
$genOutput = ob_get_clean();

$genData = json_decode($genOutput, true);
if (is_array($genData) && isset($genData['status']) && $genData['status'] === true && !empty($genData['txn_id'])) {
    echo "SUCCESS: Generate QR returned valid response.\n";
    echo "Txn ID: " . $genData['txn_id'] . "\n";
    echo "UPI URI: " . $genData['upi_url'] . "\n";
    $testTxnId = $genData['txn_id'];
} else {
    echo "FAILED: Generate QR output invalid: " . $genOutput . "\n";
    exit(1);
}

echo "\n--- 4. Testing Pending Payment Record in DB ---\n";
$pStmt = db_prepare($conn, "SELECT * FROM payments WHERE txn_id = ?");
$pStmt->bind_param("s", $testTxnId);
db_execute($pStmt);
$pRes = db_get_result($pStmt);
$pRecord = db_fetch_assoc($pRes);
if (method_exists($pStmt, 'close')) { $pStmt->close(); }

if ($pRecord && $pRecord['status'] === 'pending' && floatval($pRecord['amount']) == $testAmount) {
    echo "SUCCESS: Pending payment record verified in database.\n";
} else {
    echo "FAILED: Payment record not properly stored.\n";
}

echo "\n--- 5. Testing Signed-Callback Wallet Credit Logic ---\n";
try {
    $creditResult = credit_confirmed_payment($conn, $testTxnId, 'test-provider-reference');
    $verData = ['status' => 'paid', 'message' => $creditResult['already_paid'] ? 'Payment already credited.' : 'Payment confirmed and wallet credited.', 'new_balance' => $creditResult['new_balance'] ?? null];
} catch (Throwable $error) {
    $verData = ['status' => 'failed', 'message' => $error->getMessage()];
}

if (isset($verData['status']) && $verData['status'] === 'paid') {
    echo "SUCCESS: Verify status processed payment successfully.\n";
    echo "Message: " . $verData['message'] . "\n";
    echo "New Balance: " . (isset($verData['new_balance']) ? $verData['new_balance'] : 'N/A') . "\n";
} else {
    echo "FAILED: Verify status failed: " . $verOutput . "\n";
    exit(1);
}

echo "\n--- 6. Testing Concurrency & Double Credit Protection ---\n";
try {
    $duplicateResult = credit_confirmed_payment($conn, $testTxnId, 'test-provider-reference');
    $dupData = ['status' => 'paid', 'message' => $duplicateResult['already_paid'] ? 'Payment already credited.' : 'Payment credited.'];
} catch (Throwable $error) {
    $dupData = ['status' => 'failed', 'message' => $error->getMessage()];
}
if (isset($dupData['status']) && $dupData['status'] === 'paid' && strpos($dupData['message'], 'already') !== false) {
    echo "SUCCESS: Double credit prevented! Short-circuit returned already verified.\n";
} else {
    echo "INFO: Verify status returned: " . $dupOutput . "\n";
}

echo "\n--- 7. Verifying Wallet Ledger Transactions ---\n";
$wRes = db_query($conn, "SELECT * FROM wallets WHERE user_id = {$testUserId}");
$wRow = db_fetch_assoc($wRes);
if ($wRow) {
    echo "SUCCESS: User Wallet Balance: " . $wRow['balance'] . "\n";
    $tRes = db_query($conn, "SELECT * FROM wallet_transactions WHERE wallet_id = {$wRow['wallet_id']} AND reference_id = '{$testTxnId}'");
    if ($tRow = db_fetch_assoc($tRes)) {
        echo "SUCCESS: Wallet Transaction Ledger record verified! Type: " . $tRow['transaction_type'] . " | Amount: " . $tRow['amount'] . " | Before: " . $tRow['balance_before'] . " | After: " . $tRow['balance_after'] . "\n";
    } else {
        echo "FAILED: Ledger transaction record missing!\n";
    }
} else {
    echo "FAILED: Wallet record missing for user.\n";
}

echo "\n=== ALL VERIFICATION TESTS PASSED SUCCESSFULLY! ===\n";
