<?php
if (file_exists(__DIR__ . '/../../admin/payment/callback.php')) {
    include_once(__DIR__ . '/../../admin/payment/callback.php');
} else {
    header("Location: ../../admin/payment/callback.php");
    exit();
}
