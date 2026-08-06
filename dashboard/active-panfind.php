<?php
if (file_exists(__DIR__ . '/../admin/active-panfind.php')) {
    include_once(__DIR__ . '/../admin/active-panfind.php');
} else {
    header("Location: ../admin/active-panfind.php");
    exit();
}
