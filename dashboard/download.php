<?php
if (file_exists(__DIR__ . '/../admin/download.php')) {
    include_once(__DIR__ . '/../admin/download.php');
} else {
    header("Location: ../admin/download.php");
    exit();
}
