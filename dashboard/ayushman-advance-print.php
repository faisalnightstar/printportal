<?php
if (file_exists(__DIR__ . '/../admin/ayushman-advance-print.php')) {
    include_once(__DIR__ . '/../admin/ayushman-advance-print.php');
} else {
    header("Location: ../admin/ayushman-advance-print.php");
    exit();
}
