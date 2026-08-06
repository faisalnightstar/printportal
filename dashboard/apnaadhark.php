<?php
if (file_exists(__DIR__ . '/../admin/apnaadhark.php')) {
    include_once(__DIR__ . '/../admin/apnaadhark.php');
} else {
    header("Location: ../admin/apnaadhark.php");
    exit();
}
