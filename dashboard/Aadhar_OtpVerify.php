<?php
if (file_exists(__DIR__ . '/../admin/Aadhar_OtpVerify.php')) {
    include_once(__DIR__ . '/../admin/Aadhar_OtpVerify.php');
} else {
    header("Location: ../admin/Aadhar_OtpVerify.php");
    exit();
}
