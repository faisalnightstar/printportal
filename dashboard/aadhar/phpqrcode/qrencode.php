<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrencode.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrencode.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrencode.php");
    exit();
}
