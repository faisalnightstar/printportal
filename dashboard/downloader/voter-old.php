<?php
if (file_exists(__DIR__ . '/../../admin/downloader/voter-old.php')) {
    include_once(__DIR__ . '/../../admin/downloader/voter-old.php');
} else {
    header("Location: ../../admin/downloader/voter-old.php");
    exit();
}
