<?php
if (file_exists(__DIR__ . '/../admin/pannumberfind.php')) {
    include_once(__DIR__ . '/../admin/pannumberfind.php');
} else {
    header("Location: ../admin/pannumberfind.php");
    exit();
}
