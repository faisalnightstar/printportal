<?php
/**
 * Generate UPI QR Code Payment Endpoint
 * POST /api/payment/generate-qr
 */

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

require_once __DIR__ . '/db_helper.php';

// Accept JSON input or standard POST
$rawInput = file_get_contents('php://input');
$jsonParams = json_decode($rawInput, true);

$amountInput = 0;
if (isset($_POST['amount'])) {
    $amountInput = $_POST['amount'];
} elseif (is_array($jsonParams) && isset($jsonParams['amount'])) {
    $amountInput = $jsonParams['amount'];
}

$userId = payment_current_user_id();

if ($userId <= 0) {
    send_json_response([
        'status' => false,
        'message' => 'User authentication required. Please log in.'
    ], 401);
}

$amount = floatval($amountInput);
if ($amount <= 0 || $amount > 100000) {
    send_json_response([
        'status' => false,
        'message' => 'Invalid payment amount. Enter an amount between ₹1 and ₹100,000.'
    ], 400);
}

$conn = get_db_connection();
if (!$conn) {
    send_json_response([
        'status' => false,
        'message' => 'Database connection unavailable.'
    ], 500);
}

// Fetch active upi_id from payment_accounts or fallback to env
$upiId = '';
$paRes = db_query($conn, "SELECT upi_id FROM payment_accounts WHERE status = 'active' ORDER BY id DESC LIMIT 1");
if ($paRes && $paRow = db_fetch_assoc($paRes)) {
    $upiId = trim($paRow['upi_id']);
}
if (empty($upiId)) {
    $upiId = get_env_val('PAYTM_UPI_ID', 'paytm.s1ljhtn@pty');
}

$businessName = get_env_val('BUSINESS_NAME', 'PrintPortalCard');

// Generate unique transaction ID
$txnId = 'wallet_' . time() . '_' . str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);

// Format amount to 2 decimal places
$formattedAmount = number_format($amount, 2, '.', '');

// Format standard UPI URI
$upiUrl = "upi://pay?pa=" . rawurlencode($upiId) .
          "&pn=" . rawurlencode($businessName) .
          "&am=" . rawurlencode($formattedAmount) .
          "&cu=INR" .
          "&tr=" . rawurlencode($txnId);

// Insert pending record in payments
$insertStmt = db_prepare($conn, "INSERT INTO payments (txn_id, user_id, amount, status, method, created_at) VALUES (?, ?, ?, 'pending', 'upi_qr', NOW())");
if (!$insertStmt) {
    send_json_response([
        'status' => false,
        'message' => 'Failed to prepare payment transaction.'
    ], 500);
}

$insertStmt->bind_param("sid", $txnId, $userId, $amount);
$executed = db_execute($insertStmt);
if (method_exists($insertStmt, 'close')) { $insertStmt->close(); }

if (!$executed) {
    send_json_response([
        'status' => false,
        'message' => 'Could not record pending payment transaction.'
    ], 500);
}

send_json_response([
    'status' => true,
    'upi_url' => $upiUrl,
    'txn_id' => $txnId,
    'amount' => $amount,
    'upi_id' => $upiId,
    'business_name' => $businessName
]);
