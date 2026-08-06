<?php
if (file_exists(__DIR__ . '/../../admin/aadhar/aadhar.php')) {
    include_once(__DIR__ . '/../../admin/aadhar/aadhar.php');
} else {
    header("Location: ../../admin/aadhar/aadhar.php");
    exit();
}
