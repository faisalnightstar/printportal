<?php
if (file_exists(__DIR__ . '/../admin/dlm.php')) {
    include_once(__DIR__ . '/../admin/dlm.php');
} else {
    header("Location: ../admin/dlm.php");
    exit();
}
