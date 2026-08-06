<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrconst.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/phpqrcode/qrconst.php');
} else {
    header("Location: ../../../admin/aadhar/phpqrcode/qrconst.php");
    exit();
}
