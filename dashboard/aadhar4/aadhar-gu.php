<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhar-gu.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhar-gu.php');
} else {
    header("Location: ../../admin/aadhar4/aadhar-gu.php");
    exit();
}
