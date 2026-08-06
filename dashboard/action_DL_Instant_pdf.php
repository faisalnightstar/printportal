<?php
if (file_exists(__DIR__ . '/../admin/action_DL_Instant_pdf.php')) {
    include_once(__DIR__ . '/../admin/action_DL_Instant_pdf.php');
} else {
    header("Location: ../admin/action_DL_Instant_pdf.php");
    exit();
}
