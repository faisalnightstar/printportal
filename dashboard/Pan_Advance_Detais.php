<?php
if (file_exists(__DIR__ . '/../admin/Pan_Advance_Detais.php')) {
    include_once(__DIR__ . '/../admin/Pan_Advance_Detais.php');
} else {
    header("Location: ../admin/Pan_Advance_Detais.php");
    exit();
}
