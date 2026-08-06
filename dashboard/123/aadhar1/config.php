<?php
if (file_exists(__DIR__ . '/../../../admin/123/aadhar1/config.php')) {
    include_once(__DIR__ . '/../../../admin/123/aadhar1/config.php');
} else {
    header("Location: ../../../admin/123/aadhar1/config.php");
    exit();
}
