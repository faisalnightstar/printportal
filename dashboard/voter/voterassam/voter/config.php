<?php
if (file_exists(__DIR__ . '/../../../../admin/voter/voterassam/voter/config.php')) {
    include_once(__DIR__ . '/../../../../admin/voter/voterassam/voter/config.php');
} else {
    header("Location: ../../../../admin/voter/voterassam/voter/config.php");
    exit();
}
