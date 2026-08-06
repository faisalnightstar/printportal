<?php
if (file_exists(__DIR__ . '/../../admin/voter/vn.php')) {
    include_once(__DIR__ . '/../../admin/voter/vn.php');
} else {
    header("Location: ../../admin/voter/vn.php");
    exit();
}
