<?php
if (file_exists(__DIR__ . '/../../../admin/aadhar/imgmanualaadhaar/index.php')) {
    include_once(__DIR__ . '/../../../admin/aadhar/imgmanualaadhaar/index.php');
} else {
    header("Location: ../../../admin/aadhar/imgmanualaadhaar/index.php");
    exit();
}
