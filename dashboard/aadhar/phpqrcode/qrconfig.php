<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrconfig.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrconfig.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrconfig.php");
    exit();
}
