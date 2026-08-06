<?php
if (file_exists(__DIR__ . '/../../admin/aadhar4/aadharmanual.php')) {
    include_once(__DIR__ . '/../../admin/aadhar4/aadharmanual.php');
} else {
    header("Location: ../../admin/aadhar4/aadharmanual.php");
    exit();
}
