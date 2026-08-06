<?php
if (file_exists(__DIR__ . '/../admin/uploadpanfind.php')) {
    include_once(__DIR__ . '/../admin/uploadpanfind.php');
} else {
    header("Location: ../admin/uploadpanfind.php");
    exit();
}
