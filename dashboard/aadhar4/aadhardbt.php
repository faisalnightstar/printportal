<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhardbt.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhardbt.php');
} else {
    header("Location: ../../admin/aadhar4/aadhardbt.php");
    exit();
}
