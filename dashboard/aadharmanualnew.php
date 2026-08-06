<?php
if (file_exists(__DIR__ . '/../admin/aadharmanualnew.php')) {
    include_once(__DIR__ . '/../admin/aadharmanualnew.php');
} else {
    header("Location: ../admin/aadharmanualnew.php");
    exit();
}
