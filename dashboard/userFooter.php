<?php
if (file_exists(__DIR__ . '/../admin/userFooter.php')) {
    include_once(__DIR__ . '/../admin/userFooter.php');
} else {
    header("Location: ../admin/userFooter.php");
    exit();
}
