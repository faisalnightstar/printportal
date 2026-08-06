<?php
if (file_exists(__DIR__ . '/../admin/state_list.php')) {
    include_once(__DIR__ . '/../admin/state_list.php');
} else {
    header("Location: ../admin/state_list.php");
    exit();
}
