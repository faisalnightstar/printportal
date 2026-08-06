<?php
if (file_exists(__DIR__ . '/../admin/dlmv.php')) {
    include_once(__DIR__ . '/../admin/dlmv.php');
} else {
    header("Location: ../admin/dlmv.php");
    exit();
}
