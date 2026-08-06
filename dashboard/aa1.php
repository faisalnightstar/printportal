<?php
if (file_exists(__DIR__ . '/../admin/aa1.php')) {
    include_once(__DIR__ . '/../admin/aa1.php');
} else {
    header("Location: ../admin/aa1.php");
    exit();
}
