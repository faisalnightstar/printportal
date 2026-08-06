<?php
if (file_exists(__DIR__ . '/../admin/pan_details_verify.php')) {
    include_once(__DIR__ . '/../admin/pan_details_verify.php');
} else {
    header("Location: ../admin/pan_details_verify.php");
    exit();
}
