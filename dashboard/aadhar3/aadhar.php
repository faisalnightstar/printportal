<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadhar.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadhar.php');
} else {
    header("Location: ../../admin/aadhar3/aadhar.php");
    exit();
}
