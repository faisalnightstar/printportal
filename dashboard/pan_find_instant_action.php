<?php
if (file_exists(__DIR__ . '/../admin/pan_find_instant_action.php')) {
    include_once(__DIR__ . '/../admin/pan_find_instant_action.php');
} else {
    header("Location: ../admin/pan_find_instant_action.php");
    exit();
}
