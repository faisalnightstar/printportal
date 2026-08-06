<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar4/images/aadhar-te.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar4/images/aadhar-te.php');
} else {
    header("Location: ../../../admin/aadhar4/images/aadhar-te.php");
    exit();
}
