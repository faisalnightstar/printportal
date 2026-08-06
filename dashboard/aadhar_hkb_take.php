<?php
if (file_exists(__DIR__ . '/../admin/aadhar_hkb_take.php')) {
    include_once(__DIR__ . '/../admin/aadhar_hkb_take.php');
} else {
    header("Location: ../admin/aadhar_hkb_take.php");
    exit();
}
