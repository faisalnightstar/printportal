<?php
if (file_exists(__DIR__ . '/../admin/dlactive.php')) {
    include_once(__DIR__ . '/../admin/dlactive.php');
} else {
    header("Location: ../admin/dlactive.php");
    exit();
}
