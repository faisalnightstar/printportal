<?php
if (file_exists(__DIR__ . '/../admin/aadharnumberfind.php')) {
    include_once(__DIR__ . '/../admin/aadharnumberfind.php');
} else {
    header("Location: ../admin/aadharnumberfind.php");
    exit();
}
