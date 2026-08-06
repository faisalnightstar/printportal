<?php
if (file_exists(__DIR__ . '/../../admin/vm/voterassam2.php')) {
    include_once(__DIR__ . '/../../admin/vm/voterassam2.php');
} else {
    header("Location: ../../admin/vm/voterassam2.php");
    exit();
}
