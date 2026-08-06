<?php
if (file_exists(__DIR__ . '/../../admin/payment/PaymentLedger.php')) {
    include_once(__DIR__ . '/../../admin/payment/PaymentLedger.php');
} else {
    header("Location: ../../admin/payment/PaymentLedger.php");
    exit();
}
