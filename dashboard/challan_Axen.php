<?php
if (file_exists(__DIR__ . '/../admin/challan_Axen.php')) {
    include_once(__DIR__ . '/../admin/challan_Axen.php');
} else {
    header("Location: ../admin/challan_Axen.php");
    exit();
}
