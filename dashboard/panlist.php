<?php
if (file_exists(__DIR__ . '/../admin/panlist.php')) {
    include_once(__DIR__ . '/../admin/panlist.php');
} else {
    header("Location: ../admin/panlist.php");
    exit();
}
