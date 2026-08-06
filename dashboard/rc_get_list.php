<?php
if (file_exists(__DIR__ . '/../admin/rc_get_list.php')) {
    include_once(__DIR__ . '/../admin/rc_get_list.php');
} else {
    header("Location: ../admin/rc_get_list.php");
    exit();
}
