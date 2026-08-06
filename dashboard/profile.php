<?php
if (file_exists(__DIR__ . '/../admin/profile.php')) {
    include_once(__DIR__ . '/../admin/profile.php');
} else {
    header("Location: ../admin/profile.php");
    exit();
}
