<?php
if (file_exists(__DIR__ . '/../admin/ayousmanprint1.php')) {
    include_once(__DIR__ . '/../admin/ayousmanprint1.php');
} else {
    header("Location: ../admin/ayousmanprint1.php");
    exit();
}
