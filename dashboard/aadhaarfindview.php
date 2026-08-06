<?php
if (file_exists(__DIR__ . '/../admin/aadhaarfindview.php')) {
    include_once(__DIR__ . '/../admin/aadhaarfindview.php');
} else {
    header("Location: ../admin/aadhaarfindview.php");
    exit();
}
