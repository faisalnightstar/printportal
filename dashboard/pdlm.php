<?php
if (file_exists(__DIR__ . '/../admin/pdlm.php')) {
    include_once(__DIR__ . '/../admin/pdlm.php');
} else {
    header("Location: ../admin/pdlm.php");
    exit();
}
