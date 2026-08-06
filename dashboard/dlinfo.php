<?php
if (file_exists(__DIR__ . '/../admin/dlinfo.php')) {
    include_once(__DIR__ . '/../admin/dlinfo.php');
} else {
    header("Location: ../admin/dlinfo.php");
    exit();
}
