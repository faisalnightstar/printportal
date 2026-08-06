<?php
if (file_exists(__DIR__ . '/../admin/panel.php')) {
    include_once(__DIR__ . '/../admin/panel.php');
} else {
    header("Location: ../admin/panel.php");
    exit();
}
