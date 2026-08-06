<?php
if (file_exists(__DIR__ . '/../admin/panfindlist.php')) {
    include_once(__DIR__ . '/../admin/panfindlist.php');
} else {
    header("Location: ../admin/panfindlist.php");
    exit();
}
