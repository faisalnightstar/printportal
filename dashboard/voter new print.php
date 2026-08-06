<?php
if (file_exists(__DIR__ . '/../admin/voter new print.php')) {
    include_once(__DIR__ . '/../admin/voter new print.php');
} else {
    header("Location: ../admin/voter new print.php");
    exit();
}
