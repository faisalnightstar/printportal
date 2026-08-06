<?php
if (file_exists(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merged_header.php')) {
    include_once(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merged_header.php');
} else {
    header("Location: ../../../../admin/aadhar/phpqrcode/tools/merged_header.php");
    exit();
}
