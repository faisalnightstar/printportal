<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhar-mr.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhar-mr.php');
} else {
    header("Location: ../../admin/aadhar4/aadhar-mr.php");
    exit();
}
