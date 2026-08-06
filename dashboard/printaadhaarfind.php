<?php
if (file_exists(__DIR__ . '/../admin/printaadhaarfind.php')) {
    include_once(__DIR__ . '/../admin/printaadhaarfind.php');
} else {
    header("Location: ../admin/printaadhaarfind.php");
    exit();
}
