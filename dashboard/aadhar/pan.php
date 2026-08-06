<?php
if (file_exists(__DIR__ . '/../../admin/aadhar/pan.php')) {
    include_once(__DIR__ . '/../../admin/aadhar/pan.php');
} else {
    header("Location: ../../admin/aadhar/pan.php");
    exit();
}
