<?php
if (file_exists(__DIR__ . '/../../../../admin/voter1/voterassam/voter/voter.php')) {
    include_once(__DIR__ . '/../../../../admin/voter1/voterassam/voter/voter.php');
} else {
    header("Location: ../../../../admin/voter1/voterassam/voter/voter.php");
    exit();
}
