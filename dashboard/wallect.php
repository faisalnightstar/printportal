<?php
if (file_exists(__DIR__ . '/../admin/wallect.php')) {
    include_once(__DIR__ . '/../admin/wallect.php');
} else {
    header("Location: ../admin/wallect.php");
    exit();
}
