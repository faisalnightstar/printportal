<?php
if (file_exists(__DIR__ . '/../../admin/payment/PaytmChecksum.php')) {
    include_once(__DIR__ . '/../../admin/payment/PaytmChecksum.php');
} else {
    header("Location: ../../admin/payment/PaytmChecksum.php");
    exit();
}
