<?php
if (file_exists(__DIR__ . '/../../admin/downloader/simple_html_dom.php')) {
    include_once(__DIR__ . '/../../admin/downloader/simple_html_dom.php');
} else {
    header("Location: ../../admin/downloader/simple_html_dom.php");
    exit();
}
