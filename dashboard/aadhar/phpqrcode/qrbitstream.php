<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrbitstream.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrbitstream.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrbitstream.php");
    exit();
}
