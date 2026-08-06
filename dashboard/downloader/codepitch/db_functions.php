<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/db_functions.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/db_functions.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/db_functions.php");
    exit();
}
