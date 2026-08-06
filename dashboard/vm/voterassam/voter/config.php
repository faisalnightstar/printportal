<?php
if (file_exists(__DIR__ . '/../../../../admin/vm/voterassam/voter/config.php')) {
    include_once(__DIR__ . '/../../../../admin/vm/voterassam/voter/config.php');
} else {
    header("Location: ../../../../admin/vm/voterassam/voter/config.php");
    exit();
}
