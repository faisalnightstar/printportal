<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voterassam.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voterassam.php');
} else {
    header("Location: ../../admin/voter1/voterassam.php");
    exit();
}
