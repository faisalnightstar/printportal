<?php
if (file_exists(__DIR__ . '/../../admin/voter1/index.php')) {
    include_once(__DIR__ . '/../../admin/voter1/index.php');
} else {
    header("Location: ../../admin/voter1/index.php");
    exit();
}
