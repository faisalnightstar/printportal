<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar4/images/aadhar-kn.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar4/images/aadhar-kn.php');
} else {
    header("Location: ../../../admin/aadhar4/images/aadhar-kn.php");
    exit();
}
