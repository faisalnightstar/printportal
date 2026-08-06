<?php
if (file_exists(__DIR__ . '/../admin/aadharlistdbt.php')) {
    include_once(__DIR__ . '/../admin/aadharlistdbt.php');
} else {
    header("Location: ../admin/aadharlistdbt.php");
    exit();
}
