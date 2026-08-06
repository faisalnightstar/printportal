<?php
if (file_exists(__DIR__ . '/../admin/aadharfindlist.php')) {
    include_once(__DIR__ . '/../admin/aadharfindlist.php');
} else {
    header("Location: ../admin/aadharfindlist.php");
    exit();
}
