<?php
if (file_exists(__DIR__ . '/../admin/aa2.php')) {
    include_once(__DIR__ . '/../admin/aa2.php');
} else {
    header("Location: ../admin/aa2.php");
    exit();
}
