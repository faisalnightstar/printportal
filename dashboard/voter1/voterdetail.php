<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voterdetail.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voterdetail.php');
} else {
    header("Location: ../../admin/voter1/voterdetail.php");
    exit();
}
