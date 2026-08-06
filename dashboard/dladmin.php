<?php
if (file_exists(__DIR__ . '/../admin/dladmin.php')) {
    include_once(__DIR__ . '/../admin/dladmin.php');
} else {
    header("Location: ../admin/dladmin.php");
    exit();
}
