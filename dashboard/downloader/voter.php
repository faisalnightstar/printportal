<?php
if (file_exists(__DIR__ . '/../../admin/downloader/voter.php')) {
    include_once(__DIR__ . '/../../admin/downloader/voter.php');
} else {
    header("Location: ../../admin/downloader/voter.php");
    exit();
}
