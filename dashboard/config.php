<?php
if (file_exists(__DIR__ . '/../admin/config.php')) {
    include_once(__DIR__ . '/../admin/config.php');
} else {
    header("Location: ../admin/config.php");
    exit();
}
