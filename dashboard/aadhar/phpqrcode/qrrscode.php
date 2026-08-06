<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrrscode.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrrscode.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrrscode.php");
    exit();
}
