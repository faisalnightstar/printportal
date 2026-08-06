<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/autoload.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/autoload.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/autoload.php");
    exit();
}
