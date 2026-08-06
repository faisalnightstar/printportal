<?php
if (file_exists(__DIR__ . '/../admin/panfindview.php')) {
    include_once(__DIR__ . '/../admin/panfindview.php');
} else {
    header("Location: ../admin/panfindview.php");
    exit();
}
