<?php
if (file_exists(__DIR__ . '/../../../admin/voter/pvc/khu.php')) {
    include_once(__DIR__ . '/../../../admin/voter/pvc/khu.php');
} else {
    header("Location: ../../../admin/voter/pvc/khu.php");
    exit();
}
