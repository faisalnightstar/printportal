<?php
if (file_exists(__DIR__ . '/../../../../admin/vm/voterassam/voter/voterassam.php')) {
    include_once(__DIR__ . '/../../../../admin/vm/voterassam/voter/voterassam.php');
} else {
    header("Location: ../../../../admin/vm/voterassam/voter/voterassam.php");
    exit();
}
