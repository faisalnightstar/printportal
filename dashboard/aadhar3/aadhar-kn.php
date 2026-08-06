<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadhar-kn.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadhar-kn.php');
} else {
    header("Location: ../../admin/aadhar3/aadhar-kn.php");
    exit();
}
