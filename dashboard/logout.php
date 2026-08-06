<?php
if (file_exists(__DIR__ . '/../admin/logout.php')) {
    include_once(__DIR__ . '/../admin/logout.php');
} else {
    header("Location: ../admin/logout.php");
    exit();
}
