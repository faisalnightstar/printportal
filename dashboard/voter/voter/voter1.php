<?php
if (file_exists(__DIR__ . '/../../../admin/voter/voter/voter1.php')) {
    include_once(__DIR__ . '/../../../admin/voter/voter/voter1.php');
} else {
    header("Location: ../../../admin/voter/voter/voter1.php");
    exit();
}
