<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrinput.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrinput.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrinput.php");
    exit();
}
