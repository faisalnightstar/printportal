<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voter.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voter.php');
} else {
    header("Location: ../../admin/voter1/voter.php");
    exit();
}
