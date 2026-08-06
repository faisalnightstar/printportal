<?php
if (file_exists(__DIR__ . '/../../../admin/voter/pvc/voter.php')) {
    include_once(__DIR__ . '/../../../admin/voter/pvc/voter.php');
} else {
    header("Location: ../../../admin/voter/pvc/voter.php");
    exit();
}
