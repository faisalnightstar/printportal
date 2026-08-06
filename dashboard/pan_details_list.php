<?php
if (file_exists(__DIR__ . '/../admin/pan_details_list.php')) {
    include_once(__DIR__ . '/../admin/pan_details_list.php');
} else {
    header("Location: ../admin/pan_details_list.php");
    exit();
}
