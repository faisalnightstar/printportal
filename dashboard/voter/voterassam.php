<?php
if (file_exists(__DIR__ . '/../../admin/voter/voterassam.php')) {
    include_once(__DIR__ . '/../../admin/voter/voterassam.php');
} else {
    header("Location: ../../admin/voter/voterassam.php");
    exit();
}
