<?php
if (file_exists(__DIR__ . '/../admin/paninfo.php')) {
    include_once(__DIR__ . '/../admin/paninfo.php');
} else {
    header("Location: ../admin/paninfo.php");
    exit();
}
