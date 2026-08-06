<?php
if (file_exists(__DIR__ . '/../admin/panmanuls.php')) {
    include_once(__DIR__ . '/../admin/panmanuls.php');
} else {
    header("Location: ../admin/panmanuls.php");
    exit();
}
