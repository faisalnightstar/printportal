<?php
if (file_exists(__DIR__ . '/../admin/DL_Instant_Hd.php')) {
    include_once(__DIR__ . '/../admin/DL_Instant_Hd.php');
} else {
    header("Location: ../admin/DL_Instant_Hd.php");
    exit();
}
