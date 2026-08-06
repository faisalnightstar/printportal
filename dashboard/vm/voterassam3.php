<?php
if (file_exists(__DIR__ . '/../../admin/vm/voterassam3.php')) {
    include_once(__DIR__ . '/../../admin/vm/voterassam3.php');
} else {
    header("Location: ../../admin/vm/voterassam3.php");
    exit();
}
