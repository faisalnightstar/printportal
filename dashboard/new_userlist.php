<?php
if (file_exists(__DIR__ . '/../admin/new_userlist.php')) {
    include_once(__DIR__ . '/../admin/new_userlist.php');
} else {
    header("Location: ../admin/new_userlist.php");
    exit();
}
