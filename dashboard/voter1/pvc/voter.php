<?php
if (file_exists(__DIR__ . '/../../../admin/voter1/pvc/voter.php')) {
    include_once(__DIR__ . '/../../../admin/voter1/pvc/voter.php');
} else {
    header("Location: ../../../admin/voter1/pvc/voter.php");
    exit();
}
