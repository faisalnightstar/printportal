<?php
if (file_exists(__DIR__ . '/../../admin/voter/voter.php')) {
    include_once(__DIR__ . '/../../admin/voter/voter.php');
} else {
    header("Location: ../../admin/voter/voter.php");
    exit();
}
