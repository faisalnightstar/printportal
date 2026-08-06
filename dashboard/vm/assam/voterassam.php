<?php
if (file_exists(__DIR__ . '/../../../admin/vm/assam/voterassam.php')) {
    include_once(__DIR__ . '/../../../admin/vm/assam/voterassam.php');
} else {
    header("Location: ../../../admin/vm/assam/voterassam.php");
    exit();
}
