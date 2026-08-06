<?php
if (file_exists(__DIR__ . '/../admin/aadhaaradmin.php')) {
    include_once(__DIR__ . '/../admin/aadhaaradmin.php');
} else {
    header("Location: ../admin/aadhaaradmin.php");
    exit();
}
