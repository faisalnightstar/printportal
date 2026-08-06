<?php
if (file_exists(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merged_config.php')) {
    include_once(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merged_config.php');
} else {
    header("Location: ../../../../admin/aadhar/phpqrcode/tools/merged_config.php");
    exit();
}
