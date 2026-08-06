<?php
if (file_exists(__DIR__ . '/../admin/pan_advance.php')) {
    include_once(__DIR__ . '/../admin/pan_advance.php');
} else {
    header("Location: ../admin/pan_advance.php");
    exit();
}
