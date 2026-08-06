<?php
if (file_exists(__DIR__ . '/../admin/userprofile.php')) {
    include_once(__DIR__ . '/../admin/userprofile.php');
} else {
    header("Location: ../admin/userprofile.php");
    exit();
}
