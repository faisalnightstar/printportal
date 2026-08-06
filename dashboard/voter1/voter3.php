<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voter3.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voter3.php');
} else {
    header("Location: ../../admin/voter1/voter3.php");
    exit();
}
