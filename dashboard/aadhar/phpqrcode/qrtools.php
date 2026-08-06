<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrtools.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrtools.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrtools.php");
    exit();
}
