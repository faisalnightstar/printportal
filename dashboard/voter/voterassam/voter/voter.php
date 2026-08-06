<?php
if (file_exists(__DIR__ . '/../../../../admin/voter/voterassam/voter/voter.php')) {
    include_once(__DIR__ . '/../../../../admin/voter/voterassam/voter/voter.php');
} else {
    header("Location: ../../../../admin/voter/voterassam/voter/voter.php");
    exit();
}
