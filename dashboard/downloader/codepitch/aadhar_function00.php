<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/aadhar_function00.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/aadhar_function00.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/aadhar_function00.php");
    exit();
}
