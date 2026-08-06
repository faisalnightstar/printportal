<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voter2.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voter2.php');
} else {
    header("Location: ../../admin/voter1/voter2.php");
    exit();
}
