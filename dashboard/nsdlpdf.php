<?php
if (file_exists(__DIR__ . '/../admin/nsdlpdf.php')) {
    include_once(__DIR__ . '/../admin/nsdlpdf.php');
} else {
    header("Location: ../admin/nsdlpdf.php");
    exit();
}
