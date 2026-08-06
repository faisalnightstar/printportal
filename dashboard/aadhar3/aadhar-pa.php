<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadhar-pa.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadhar-pa.php');
} else {
    header("Location: ../../admin/aadhar3/aadhar-pa.php");
    exit();
}
