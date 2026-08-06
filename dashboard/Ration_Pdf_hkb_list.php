<?php
if (file_exists(__DIR__ . '/../admin/Ration_Pdf_hkb_list.php')) {
    include_once(__DIR__ . '/../admin/Ration_Pdf_hkb_list.php');
} else {
    header("Location: ../admin/Ration_Pdf_hkb_list.php");
    exit();
}
