<?php
if (file_exists(__DIR__ . '/../admin/settings.php')) {
    include_once(__DIR__ . '/../admin/settings.php');
} else {
    header("Location: ../admin/settings.php");
    exit();
}
