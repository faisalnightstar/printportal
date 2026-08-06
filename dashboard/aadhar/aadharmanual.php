<?php
if (file_exists(__DIR__ . '/../../admin/aadhar/aadharmanual.php')) {
    include_once(__DIR__ . '/../../admin/aadhar/aadharmanual.php');
} else {
    header("Location: ../../admin/aadhar/aadharmanual.php");
    exit();
}
