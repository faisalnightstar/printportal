<?php
if (file_exists(__DIR__ . '/../admin/vmp.php')) {
    include_once(__DIR__ . '/../admin/vmp.php');
} else {
    header("Location: ../admin/vmp.php");
    exit();
}
