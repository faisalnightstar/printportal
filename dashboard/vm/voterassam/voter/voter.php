<?php
if (file_exists(__DIR__ . '/../../../../admin/vm/voterassam/voter/voter.php')) {
    include_once(__DIR__ . '/../../../../admin/vm/voterassam/voter/voter.php');
} else {
    header("Location: ../../../../admin/vm/voterassam/voter/voter.php");
    exit();
}
