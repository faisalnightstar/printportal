<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/config.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/config.php');
} else {
    header("Location: ../../admin/aadhar4/config.php");
    exit();
}
