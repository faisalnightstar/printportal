<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/phpqrcode.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/phpqrcode.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/phpqrcode.php");
    exit();
}
