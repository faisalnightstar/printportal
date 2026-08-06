<?php
if (file_exists(__DIR__ . '/../admin/Job_Card_hkb_list.php')) {
    include_once(__DIR__ . '/../admin/Job_Card_hkb_list.php');
} else {
    header("Location: ../admin/Job_Card_hkb_list.php");
    exit();
}
