<?php
if (file_exists(__DIR__ . '/../admin/vot_org_instant.php')) {
    include_once(__DIR__ . '/../admin/vot_org_instant.php');
} else {
    header("Location: ../admin/vot_org_instant.php");
    exit();
}
