<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/codepitch_functions.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/codepitch_functions.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/codepitch_functions.php");
    exit();
}
