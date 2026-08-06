<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhar.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhar.php');
} else {
    header("Location: ../../admin/aadhar4/aadhar.php");
    exit();
}
