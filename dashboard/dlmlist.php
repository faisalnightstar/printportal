<?php
if (file_exists(__DIR__ . '/../admin/dlmlist.php')) {
    include_once(__DIR__ . '/../admin/dlmlist.php');
} else {
    header("Location: ../admin/dlmlist.php");
    exit();
}
