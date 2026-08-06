<?php
if (file_exists(__DIR__ . '/../admin/generated_h.php')) {
    include_once(__DIR__ . '/../admin/generated_h.php');
} else {
    header("Location: ../admin/generated_h.php");
    exit();
}
