<?php
if (file_exists(__DIR__ . '/../../admin/downloader/fetch-data.php')) {
    include_once(__DIR__ . '/../../admin/downloader/fetch-data.php');
} else {
    header("Location: ../../admin/downloader/fetch-data.php");
    exit();
}
