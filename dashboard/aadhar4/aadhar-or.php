<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhar-or.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhar-or.php');
} else {
    header("Location: ../../admin/aadhar4/aadhar-or.php");
    exit();
}
