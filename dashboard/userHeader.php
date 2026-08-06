<?php
if (file_exists(__DIR__ . '/../admin/userHeader.php')) {
    include_once(__DIR__ . '/../admin/userHeader.php');
} else {
    header("Location: ../admin/userHeader.php");
    exit();
}
