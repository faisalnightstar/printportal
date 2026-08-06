<?php
if (file_exists(__DIR__ . '/../../../admin/voter/voter/voterassam.php')) {
    include_once(__DIR__ . '/../../../admin/voter/voter/voterassam.php');
} else {
    header("Location: ../../../admin/voter/voter/voterassam.php");
    exit();
}
