<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/index.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/index.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/index.php");
    exit();
}
