<?php
if (file_exists(__DIR__ . '/../../admin/dlservice/dlnew.php')) {
    include_once(__DIR__ . '/../../admin/dlservice/dlnew.php');
} else {
    header("Location: ../../admin/dlservice/dlnew.php");
    exit();
}
