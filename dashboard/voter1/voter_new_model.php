<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voter_new_model.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voter_new_model.php');
} else {
    header("Location: ../../admin/voter1/voter_new_model.php");
    exit();
}
