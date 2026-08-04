<?php
/**
 * Trusted payment-provider callback.
 *
 * Send JSON: {"txn_id":"wallet_...","status":"paid","amount":100,"reference":"provider-payment-id"}
 * with X-Payment-Signature: HMAC-SHA256(raw request body, PAYMENT_WEBHOOK_SECRET).
 */
require_once __DIR__ . '/db_helper.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'POST') !== 'POST') {
    send_json_response(['status' => 'failed', 'message' => 'Method not allowed.'], 405);
}

$secret = get_env_val('PAYMENT_WEBHOOK_SECRET');
$rawBody = file_get_contents('php://input');
$signature = trim($_SERVER['HTTP_X_PAYMENT_SIGNATURE'] ?? '');

if ($secret === '' || $signature === '' || !hash_equals(hash_hmac('sha256', $rawBody, $secret), $signature)) {
    send_json_response(['status' => 'failed', 'message' => 'Invalid payment callback signature.'], 401);
}

$payload = json_decode($rawBody, true);
if (!is_array($payload)) { send_json_response(['status' => 'failed', 'message' => 'Invalid JSON payload.'], 400); }

$txnId = trim((string) ($payload['txn_id'] ?? ''));
$status = strtolower(trim((string) ($payload['status'] ?? '')));
$amount = isset($payload['amount']) ? (float) $payload['amount'] : 0.0;
$reference = substr(trim((string) ($payload['reference'] ?? '')), 0, 100);
if ($txnId === '' || !in_array($status, ['paid', 'failed'], true)) {
    send_json_response(['status' => 'failed', 'message' => 'Missing or invalid transaction status.'], 400);
}

$conn = get_db_connection();
if (!$conn) { send_json_response(['status' => 'failed', 'message' => 'Database connection unavailable.'], 500); }

$check = db_prepare($conn, 'SELECT amount, status FROM payments WHERE txn_id = ? LIMIT 1');
$check->bind_param('s', $txnId);
db_execute($check);
$payment = db_fetch_assoc(db_get_result($check));
if (method_exists($check, 'close')) { $check->close(); }
if (!$payment) { send_json_response(['status' => 'failed', 'message' => 'Transaction reference not found.'], 404); }
if ($amount <= 0 || abs((float) $payment['amount'] - $amount) > 0.009) {
    send_json_response(['status' => 'failed', 'message' => 'Payment amount does not match the transaction.'], 400);
}

if ($status === 'failed') {
    $failed = db_prepare($conn, "UPDATE payments SET status = 'failed' WHERE txn_id = ? AND status = 'pending'");
    $failed->bind_param('s', $txnId);
    db_execute($failed);
    if (method_exists($failed, 'close')) { $failed->close(); }
    send_json_response(['status' => 'failed', 'message' => 'Payment marked as failed.']);
}

try {
    $result = credit_confirmed_payment($conn, $txnId, $reference);
    send_json_response(['status' => 'paid', 'message' => $result['already_paid'] ? 'Payment already credited.' : 'Payment confirmed and wallet credited.', 'new_balance' => $result['new_balance'] ?? null]);
} catch (Throwable $error) {
    error_log('Payment webhook error: ' . $error->getMessage());
    send_json_response(['status' => 'failed', 'message' => 'Unable to process the payment confirmation.'], 500);
}
