<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrsplit.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrsplit.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrsplit.php");
    exit();
}
