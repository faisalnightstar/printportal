<?php
if (file_exists(__DIR__ . '/../admin/pan_instant_edit.php')) {
    include_once(__DIR__ . '/../admin/pan_instant_edit.php');
} else {
    header("Location: ../admin/pan_instant_edit.php");
    exit();
}
