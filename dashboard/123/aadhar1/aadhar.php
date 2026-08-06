<?php
if (file_exists(__DIR__ . '/../../../admin/123/aadhar1/aadhar.php')) {
    include_once(__DIR__ . '/../../../admin/123/aadhar1/aadhar.php');
} else {
    header("Location: ../../../admin/123/aadhar1/aadhar.php");
    exit();
}
