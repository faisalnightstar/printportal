<?php
if (file_exists(__DIR__ . '/../admin/a1.php')) {
    include_once(__DIR__ . '/../admin/a1.php');
} else {
    header("Location: ../admin/a1.php");
    exit();
}
