<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/configfile.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/configfile.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/configfile.php");
    exit();
}
