<?php
if (file_exists(__DIR__ . '/../admin/pandlite.php')) {
    include_once(__DIR__ . '/../admin/pandlite.php');
} else {
    header("Location: ../admin/pandlite.php");
    exit();
}
