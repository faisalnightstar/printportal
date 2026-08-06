<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadhar-te.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadhar-te.php');
} else {
    header("Location: ../../admin/aadhar3/aadhar-te.php");
    exit();
}
