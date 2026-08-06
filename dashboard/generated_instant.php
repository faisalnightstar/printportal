<?php
if (file_exists(__DIR__ . '/../admin/generated_instant.php')) {
    include_once(__DIR__ . '/../admin/generated_instant.php');
} else {
    header("Location: ../admin/generated_instant.php");
    exit();
}
