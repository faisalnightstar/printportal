<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/admin.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/admin.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/admin.php");
    exit();
}
