<?php
if (file_exists(__DIR__ . '/../admin/simple_html_dom.php')) {
    include_once(__DIR__ . '/../admin/simple_html_dom.php');
} else {
    header("Location: ../admin/simple_html_dom.php");
    exit();
}
