<?php
if (file_exists(__DIR__ . '/../admin/printpanfind.php')) {
    include_once(__DIR__ . '/../admin/printpanfind.php');
} else {
    header("Location: ../admin/printpanfind.php");
    exit();
}
