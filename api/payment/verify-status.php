<?php
/**
 * Return the status of a user's own UPI payment.
 *
 * Payment confirmation is performed by webhook.php, not by trusting a browser
 * poll or an unauthenticated Paytm status request.
 */
if (session_status() === PHP_SESSION_NONE && !headers_sent()) { session_start(); }
require_once __DIR__ . '/db_helper.php';

$input = json_decode(file_get_contents('php://input'), true);
$txnId = trim($_POST['txn_id'] ?? ($input['txn_id'] ?? ''));
$userId = payment_current_user_id();

if ($userId <= 0) {
    send_json_response(['status' => 'failed', 'message' => 'User authentication required.'], 401);
}
if ($txnId === '') {
    send_json_response(['status' => 'failed', 'message' => 'Missing transaction ID.'], 400);
}

$conn = get_db_connection();
if (!$conn) { send_json_response(['status' => 'failed', 'message' => 'Database connection unavailable.'], 500); }

$stmt = db_prepare($conn, 'SELECT status, created_at FROM payments WHERE txn_id = ? AND user_id = ? LIMIT 1');
if (!$stmt) { send_json_response(['status' => 'failed', 'message' => 'Unable to read the transaction.'], 500); }
$stmt->bind_param('si', $txnId, $userId);
db_execute($stmt);
$payment = db_fetch_assoc(db_get_result($stmt));
if (method_exists($stmt, 'close')) { $stmt->close(); }

if (!$payment) { send_json_response(['status' => 'failed', 'message' => 'Transaction reference not found.'], 404); }
if ($payment['status'] === 'paid') { send_json_response(['status' => 'paid', 'message' => 'Payment verified and wallet credited.']); }
if ($payment['status'] === 'failed') { send_json_response(['status' => 'failed', 'message' => 'Payment was declined or cancelled.']); }

send_json_response(['status' => 'pending', 'message' => 'Waiting for the payment provider confirmation.']);
