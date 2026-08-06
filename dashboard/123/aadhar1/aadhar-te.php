<?php
if (file_exists(__DIR__ . '/../../../admin/123/aadhar1/aadhar-te.php')) {
    include_once(__DIR__ . '/../../../admin/123/aadhar1/aadhar-te.php');
} else {
    header("Location: ../../../admin/123/aadhar1/aadhar-te.php");
    exit();
}
