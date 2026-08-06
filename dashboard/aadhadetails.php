<?php
if (file_exists(__DIR__ . '/../admin/aadhadetails.php')) {
    include_once(__DIR__ . '/../admin/aadhadetails.php');
} else {
    header("Location: ../admin/aadhadetails.php");
    exit();
}
