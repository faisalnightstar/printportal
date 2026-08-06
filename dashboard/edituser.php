<?php
if (file_exists(__DIR__ . '/../admin/edituser.php')) {
    include_once(__DIR__ . '/../admin/edituser.php');
} else {
    header("Location: ../admin/edituser.php");
    exit();
}
