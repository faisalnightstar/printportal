<?php
if (file_exists(__DIR__ . '/../../admin/aadhar/aadhar1.php')) {
    include_once(__DIR__ . '/../../admin/aadhar/aadhar1.php');
} else {
    header("Location: ../../admin/aadhar/aadhar1.php");
    exit();
}
