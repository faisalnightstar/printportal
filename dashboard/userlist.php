<?php
if (file_exists(__DIR__ . '/../admin/userlist.php')) {
    include_once(__DIR__ . '/../admin/userlist.php');
} else {
    header("Location: ../admin/userlist.php");
    exit();
}
