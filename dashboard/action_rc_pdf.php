<?php
if (file_exists(__DIR__ . '/../admin/action_rc_pdf.php')) {
    include_once(__DIR__ . '/../admin/action_rc_pdf.php');
} else {
    header("Location: ../admin/action_rc_pdf.php");
    exit();
}
