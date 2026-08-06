<?php
if (file_exists(__DIR__ . '/../../admin/downloader/voter-half.php')) {
    include_once(__DIR__ . '/../../admin/downloader/voter-half.php');
} else {
    header("Location: ../../admin/downloader/voter-half.php");
    exit();
}
