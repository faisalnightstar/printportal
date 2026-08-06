<?php
if (file_exists(__DIR__ . '/../admin/action_job_pdf.php')) {
    include_once(__DIR__ . '/../admin/action_job_pdf.php');
} else {
    header("Location: ../admin/action_job_pdf.php");
    exit();
}
