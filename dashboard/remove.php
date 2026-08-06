<?php
if (file_exists(__DIR__ . '/../admin/remove.php')) {
    include_once(__DIR__ . '/../admin/remove.php');
} else {
    header("Location: ../admin/remove.php");
    exit();
}
