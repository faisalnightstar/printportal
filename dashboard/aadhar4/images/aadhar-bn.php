<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar4/images/aadhar-bn.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar4/images/aadhar-bn.php');
} else {
    header("Location: ../../../admin/aadhar4/images/aadhar-bn.php");
    exit();
}
