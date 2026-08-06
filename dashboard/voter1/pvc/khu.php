<?php
if (file_exists(__DIR__ . '/../../../admin/voter1/pvc/khu.php')) {
    include_once(__DIR__ . '/../../../admin/voter1/pvc/khu.php');
} else {
    header("Location: ../../../admin/voter1/pvc/khu.php");
    exit();
}
