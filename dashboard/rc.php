<?php
if (file_exists(__DIR__ . '/../admin/rc.php')) {
    include_once(__DIR__ . '/../admin/rc.php');
} else {
    header("Location: ../admin/rc.php");
    exit();
}
