<?php
if (file_exists(__DIR__ . '/../../../admin/vm/assam/voterassam3.php')) {
    include_once(__DIR__ . '/../../../admin/vm/assam/voterassam3.php');
} else {
    header("Location: ../../../admin/vm/assam/voterassam3.php");
    exit();
}
