<?php
if (file_exists(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merge.php')) {
    include_once(__DIR__ . '/../../../../admin/aadhar/phpqrcode/tools/merge.php');
} else {
    header("Location: ../../../../admin/aadhar/phpqrcode/tools/merge.php");
    exit();
}
