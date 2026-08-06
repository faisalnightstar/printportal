<?php
if (file_exists(__DIR__ . '/../../../admin/voter1/pvc/voter01.php')) {
    include_once(__DIR__ . '/../../../admin/voter1/pvc/voter01.php');
} else {
    header("Location: ../../../admin/voter1/pvc/voter01.php");
    exit();
}
