<?php
if (file_exists(__DIR__ . '/../admin/dlapp.php')) {
    include_once(__DIR__ . '/../admin/dlapp.php');
} else {
    header("Location: ../admin/dlapp.php");
    exit();
}
