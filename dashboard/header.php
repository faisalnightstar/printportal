<?php
if (file_exists(__DIR__ . '/../admin/header.php')) {
    include_once(__DIR__ . '/../admin/header.php');
} else {
    header("Location: ../admin/header.php");
    exit();
}
