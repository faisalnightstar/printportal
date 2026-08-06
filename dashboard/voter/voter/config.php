<?php
if (file_exists(__DIR__ . '/../../../admin/voter/voter/config.php')) {
    include_once(__DIR__ . '/../../../admin/voter/voter/config.php');
} else {
    header("Location: ../../../admin/voter/voter/config.php");
    exit();
}
