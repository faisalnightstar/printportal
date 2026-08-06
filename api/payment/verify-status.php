<?php
/**
 * Verify Payment Status Endpoint
 * POST /api/payment/verify-status
 */

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    @session_start();
}

require_once __DIR__ . '/db_helper.php';

// Accept JSON input or standard POST
$rawInput = file_get_contents('php://input');
$jsonParams = json_decode($rawInput, true);

$txnId = '';
if (isset($_POST['txn_id'])) {
    $txnId = trim($_POST['txn_id']);
} elseif (is_array($jsonParams) && isset($jsonParams['txn_id'])) {
    $txnId = trim($jsonParams['txn_id']);
}

$userId = payment_current_user_id();

if ($userId <= 0) {
    send_json_response(['status' => 'failed', 'message' => 'User authentication required.'], 401);
}
if (empty($txnId)) {
    send_json_response(['status' => 'failed', 'message' => 'Missing transaction ID (txn_id).'], 400);
}

$conn = get_db_connection();
if (!$conn) {
    send_json_response(['status' => 'failed', 'message' => 'Database connection unavailable.'], 500);
}

// 1. Check local payment record
$stmt = db_prepare($conn, 'SELECT id, user_id, amount, status, created_at FROM payments WHERE txn_id = ? AND user_id = ? LIMIT 1');
if (!$stmt) {
    send_json_response(['status' => 'failed', 'message' => 'Unable to read the transaction.'], 500);
}
$stmt->bind_param('si', $txnId, $userId);
db_execute($stmt);
$payment = db_fetch_assoc(db_get_result($stmt));
if (method_exists($stmt, 'close')) { $stmt->close(); }

if (!$payment) {
    send_json_response(['status' => 'failed', 'message' => 'Transaction reference not found.'], 404);
}

if ($payment['status'] === 'paid') {
    send_json_response(['status' => 'paid', 'message' => 'Payment verified and wallet credited.']);
}

if ($payment['status'] === 'failed') {
    send_json_response(['status' => 'failed', 'message' => 'Payment was declined or cancelled.']);
}

// 2. Fetch active Paytm MID
$paytmMid = '';
$midRes = db_query($conn, "SELECT paytm_mid FROM payment_accounts WHERE status = 'active' ORDER BY id DESC LIMIT 1");
if ($midRes && $midRow = db_fetch_assoc($midRes)) {
    $paytmMid = trim($midRow['paytm_mid']);
}
if (empty($paytmMid)) {
    $paytmMid = get_env_val('PAYTM_MID', 'qrjSKt09165732556386');
}

// 3. Live check against Paytm status API
$paytmApiUrl = "https://securegw.paytm.in/order/status";
$postFields = json_encode([
    'MID' => $paytmMid,
    'ORDERID' => $txnId
]);

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $paytmApiUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 5,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $postFields,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
]);

$response = curl_exec($curl);
@curl_close($curl);

$result = json_decode($response, true);

if (isset($result['STATUS']) && $result['STATUS'] === 'TXN_SUCCESS') {
    $txnRef = $result['TXNID'] ?? '';
    $credited = credit_confirmed_payment($conn, $txnId, $txnRef);
    if ($credited) {
        send_json_response(['status' => 'paid', 'message' => 'Payment verified and wallet credited!']);
    } else {
        send_json_response(['status' => 'paid', 'message' => 'Payment already verified.']);
    }
}

// While customer has not yet scanned/completed payment, keep status as pending
send_json_response(['status' => 'pending', 'message' => 'Waiting for UPI payment...']);
?>
