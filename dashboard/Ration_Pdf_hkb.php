<?php
if (file_exists(__DIR__ . '/../admin/Ration_Pdf_hkb.php')) {
    include_once(__DIR__ . '/../admin/Ration_Pdf_hkb.php');
} else {
    header("Location: ../admin/Ration_Pdf_hkb.php");
    exit();
}
