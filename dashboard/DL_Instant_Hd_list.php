<?php
if (file_exists(__DIR__ . '/../admin/DL_Instant_Hd_list.php')) {
    include_once(__DIR__ . '/../admin/DL_Instant_Hd_list.php');
} else {
    header("Location: ../admin/DL_Instant_Hd_list.php");
    exit();
}
