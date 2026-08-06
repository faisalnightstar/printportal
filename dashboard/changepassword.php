<?php
if (file_exists(__DIR__ . '/../admin/changepassword.php')) {
    include_once(__DIR__ . '/../admin/changepassword.php');
} else {
    header("Location: ../admin/changepassword.php");
    exit();
}
