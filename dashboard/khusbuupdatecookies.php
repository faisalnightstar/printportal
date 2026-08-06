<?php
if (file_exists(__DIR__ . '/../admin/khusbuupdatecookies.php')) {
    include_once(__DIR__ . '/../admin/khusbuupdatecookies.php');
} else {
    header("Location: ../admin/khusbuupdatecookies.php");
    exit();
}
