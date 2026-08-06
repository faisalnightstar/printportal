<?php
if (file_exists(__DIR__ . '/../admin/add_new_user.php')) {
    include_once(__DIR__ . '/../admin/add_new_user.php');
} else {
    header("Location: ../admin/add_new_user.php");
    exit();
}
