<?php
if (file_exists(__DIR__ . '/../admin/panmanual.php')) {
    include_once(__DIR__ . '/../admin/panmanual.php');
} else {
    header("Location: ../admin/panmanual.php");
    exit();
}
