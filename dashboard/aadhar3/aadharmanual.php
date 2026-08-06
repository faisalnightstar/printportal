<?php
if (file_exists(__DIR__ . '/../../admin/aadhar3/aadharmanual.php')) {
    include_once(__DIR__ . '/../../admin/aadhar3/aadharmanual.php');
} else {
    header("Location: ../../admin/aadhar3/aadharmanual.php");
    exit();
}
