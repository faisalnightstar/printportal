<?php
if (file_exists(__DIR__ . '/../admin/generated_h_list.php')) {
    include_once(__DIR__ . '/../admin/generated_h_list.php');
} else {
    header("Location: ../admin/generated_h_list.php");
    exit();
}
