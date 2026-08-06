<?php
if (file_exists(__DIR__ . '/../../admin/payment/PaytmGateway.php')) {
    include_once(__DIR__ . '/../../admin/payment/PaytmGateway.php');
} else {
    header("Location: ../../admin/payment/PaytmGateway.php");
    exit();
}
