<?php
if (file_exists(__DIR__ . '/../admin/users.php')) {
    include_once(__DIR__ . '/../admin/users.php');
} else {
    header("Location: ../admin/users.php");
    exit();
}
