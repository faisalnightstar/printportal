<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadhar-bn.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadhar-bn.php');
} else {
    header("Location: ../../admin/aadhar4/aadhar-bn.php");
    exit();
}
