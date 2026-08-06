<?php
if (file_exists(__DIR__ . '/../../../admin/123/aadhar1/aadhar-gu.php')) {
    include_once(__DIR__ . '/../../../admin/123/aadhar1/aadhar-gu.php');
} else {
    header("Location: ../../../admin/123/aadhar1/aadhar-gu.php");
    exit();
}
