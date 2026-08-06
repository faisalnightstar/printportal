<?php
if (file_exists(__DIR__ . '/../../../../admin/voter1/voterassam/voter/votar5.php')) {
    include_once(__DIR__ . '/../../../../admin/voter1/voterassam/voter/votar5.php');
} else {
    header("Location: ../../../../admin/voter1/voterassam/voter/votar5.php");
    exit();
}
