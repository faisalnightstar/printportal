<?php
if (file_exists(__DIR__ . '/../admin/Job_Card_hkb.php')) {
    include_once(__DIR__ . '/../admin/Job_Card_hkb.php');
} else {
    header("Location: ../admin/Job_Card_hkb.php");
    exit();
}
