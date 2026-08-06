<?php
if (file_exists(__DIR__ . '/../admin/activedbt.php')) {
    include_once(__DIR__ . '/../admin/activedbt.php');
} else {
    header("Location: ../admin/activedbt.php");
    exit();
}
