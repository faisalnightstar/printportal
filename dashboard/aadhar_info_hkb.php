<?php
if (file_exists(__DIR__ . '/../admin/aadhar_info_hkb.php')) {
    include_once(__DIR__ . '/../admin/aadhar_info_hkb.php');
} else {
    header("Location: ../admin/aadhar_info_hkb.php");
    exit();
}
