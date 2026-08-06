<?php
if (file_exists(__DIR__ . '/../admin/api.php')) {
    include_once(__DIR__ . '/../admin/api.php');
} else {
    header("Location: ../admin/api.php");
    exit();
}
