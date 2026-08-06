<?php
if (file_exists(__DIR__ . '/../../admin/voter1/vn.php')) {
    include_once(__DIR__ . '/../../admin/voter1/vn.php');
} else {
    header("Location: ../../admin/voter1/vn.php");
    exit();
}
