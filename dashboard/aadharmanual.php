<?php
if (file_exists(__DIR__ . '/../admin/aadharmanual.php')) {
    include_once(__DIR__ . '/../admin/aadharmanual.php');
} else {
    header("Location: ../admin/aadharmanual.php");
    exit();
}
