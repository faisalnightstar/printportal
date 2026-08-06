<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrmask.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrmask.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrmask.php");
    exit();
}
