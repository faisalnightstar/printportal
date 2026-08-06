<?php
if (file_exists(__DIR__ . '/../../admin/vm/voterassam.php')) {
    include_once(__DIR__ . '/../../admin/vm/voterassam.php');
} else {
    header("Location: ../../admin/vm/voterassam.php");
    exit();
}
