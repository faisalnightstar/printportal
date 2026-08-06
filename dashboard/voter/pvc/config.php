<?php
if (file_exists(__DIR__ . '/../../../admin/voter/pvc/config.php')) {
    include_once(__DIR__ . '/../../../admin/voter/pvc/config.php');
} else {
    header("Location: ../../../admin/voter/pvc/config.php");
    exit();
}
