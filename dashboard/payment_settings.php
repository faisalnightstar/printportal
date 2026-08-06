<?php
if (file_exists(__DIR__ . '/../admin/payment_settings.php')) {
    include_once(__DIR__ . '/../admin/payment_settings.php');
} else {
    header("Location: ../admin/payment_settings.php");
    exit();
}
