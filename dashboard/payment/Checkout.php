<?php
if (file_exists(__DIR__ . '/../../admin/payment/Checkout.php')) {
    include_once(__DIR__ . '/../../admin/payment/Checkout.php');
} else {
    header("Location: ../../admin/payment/Checkout.php");
    exit();
}
