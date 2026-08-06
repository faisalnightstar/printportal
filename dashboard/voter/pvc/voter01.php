<?php
if (file_exists(__DIR__ . '/../../../admin/voter/pvc/voter01.php')) {
    include_once(__DIR__ . '/../../../admin/voter/pvc/voter01.php');
} else {
    header("Location: ../../../admin/voter/pvc/voter01.php");
    exit();
}
