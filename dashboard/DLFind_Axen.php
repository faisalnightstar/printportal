<?php
if (file_exists(__DIR__ . '/../admin/DLFind_Axen.php')) {
    include_once(__DIR__ . '/../admin/DLFind_Axen.php');
} else {
    header("Location: ../admin/DLFind_Axen.php");
    exit();
}
