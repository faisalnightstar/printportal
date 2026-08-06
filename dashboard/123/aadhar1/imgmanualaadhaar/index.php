<?php
if (file_exists(__DIR__ . '/../../../../admin/123/aadhar1/imgmanualaadhaar/index.php')) {
    include_once(__DIR__ . '/../../../../admin/123/aadhar1/imgmanualaadhaar/index.php');
} else {
    header("Location: ../../../../admin/123/aadhar1/imgmanualaadhaar/index.php");
    exit();
}
