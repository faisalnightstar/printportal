<?php
if (file_exists(__DIR__ . '/../admin/aadharlist.php')) {
    include_once(__DIR__ . '/../admin/aadharlist.php');
} else {
    header("Location: ../admin/aadharlist.php");
    exit();
}
