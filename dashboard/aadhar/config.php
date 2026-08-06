<?php
if (file_exists(__DIR__ . '/../../admin/aadhar/config.php')) {
    include_once(__DIR__ . '/../../admin/aadhar/config.php');
} else {
    header("Location: ../../admin/aadhar/config.php");
    exit();
}
