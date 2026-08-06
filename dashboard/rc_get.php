<?php
if (file_exists(__DIR__ . '/../admin/rc_get.php')) {
    include_once(__DIR__ . '/../admin/rc_get.php');
} else {
    header("Location: ../admin/rc_get.php");
    exit();
}
