<?php
if (file_exists(__DIR__ . '/../../../admin/voter/assam/voterassam.php')) {
    include_once(__DIR__ . '/../../../admin/voter/assam/voterassam.php');
} else {
    header("Location: ../../../admin/voter/assam/voterassam.php");
    exit();
}
