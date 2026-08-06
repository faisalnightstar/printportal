<?php
if (file_exists(__DIR__ . '/../admin/apnabackrk.php')) {
    include_once(__DIR__ . '/../admin/apnabackrk.php');
} else {
    header("Location: ../admin/apnabackrk.php");
    exit();
}
