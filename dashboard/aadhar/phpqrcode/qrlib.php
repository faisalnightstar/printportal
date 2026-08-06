<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrlib.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrlib.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrlib.php");
    exit();
}
