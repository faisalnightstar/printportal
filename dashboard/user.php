<?php
if (file_exists(__DIR__ . '/../admin/user.php')) {
    include_once(__DIR__ . '/../admin/user.php');
} else {
    header("Location: ../admin/user.php");
    exit();
}
