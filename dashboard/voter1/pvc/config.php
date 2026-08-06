<?php
if (file_exists(__DIR__ . '/../../../admin/voter1/pvc/config.php')) {
    include_once(__DIR__ . '/../../../admin/voter1/pvc/config.php');
} else {
    header("Location: ../../../admin/voter1/pvc/config.php");
    exit();
}
