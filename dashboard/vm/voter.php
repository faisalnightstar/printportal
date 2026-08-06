<?php
if (file_exists(__DIR__ . '/../../admin/vm/voter.php')) {
    include_once(__DIR__ . '/../../admin/vm/voter.php');
} else {
    header("Location: ../../admin/vm/voter.php");
    exit();
}
