<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadhardbt.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadhardbt.php');
} else {
    header("Location: ../../admin/aadhar3/aadhardbt.php");
    exit();
}
