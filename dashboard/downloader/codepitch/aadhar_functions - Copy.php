<?php
if (file_exists(__DIR__ . '/../../../admin/downloader/codepitch/aadhar_functions - Copy.php')) {
    include_once(__DIR__ . '/../../../admin/downloader/codepitch/aadhar_functions - Copy.php');
} else {
    header("Location: ../../../admin/downloader/codepitch/aadhar_functions - Copy.php");
    exit();
}
