<?php
if (file_exists(__DIR__ . '/../admin/login.php')) {
    include_once(__DIR__ . '/../admin/login.php');
} else {
    header("Location: ../admin/login.php");
    exit();
}
