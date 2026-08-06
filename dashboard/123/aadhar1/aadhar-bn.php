<?php
if (file_exists(__DIR__ . '/../../../admin/123/aadhar1/aadhar-bn.php')) {
    include_once(__DIR__ . '/../../../admin/123/aadhar1/aadhar-bn.php');
} else {
    header("Location: ../../../admin/123/aadhar1/aadhar-bn.php");
    exit();
}
