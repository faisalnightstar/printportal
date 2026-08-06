<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrspec.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrspec.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrspec.php");
    exit();
}
