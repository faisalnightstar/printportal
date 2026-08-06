<?php
if (file_exists(__DIR__ . '/../admin/pan_find_instant.php')) {
    include_once(__DIR__ . '/../admin/pan_find_instant.php');
} else {
    header("Location: ../admin/pan_find_instant.php");
    exit();
}
