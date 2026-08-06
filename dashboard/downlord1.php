<?php
if (file_exists(__DIR__ . '/../admin/downlord1.php')) {
    include_once(__DIR__ . '/../admin/downlord1.php');
} else {
    header("Location: ../admin/downlord1.php");
    exit();
}
