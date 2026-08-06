<?php
if (file_exists(__DIR__ . '/../../../admin/voter1/assam/voterassam3.php')) {
    include_once(__DIR__ . '/../../../admin/voter1/assam/voterassam3.php');
} else {
    header("Location: ../../../admin/voter1/assam/voterassam3.php");
    exit();
}
