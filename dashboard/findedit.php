<?php
if (file_exists(__DIR__ . '/../admin/findedit.php')) {
    include_once(__DIR__ . '/../admin/findedit.php');
} else {
    header("Location: ../admin/findedit.php");
    exit();
}
