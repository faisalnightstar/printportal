<?php
if (file_exists(__DIR__ . '/../admin/uploadaadhaar.php')) {
    include_once(__DIR__ . '/../admin/uploadaadhaar.php');
} else {
    header("Location: ../admin/uploadaadhaar.php");
    exit();
}
