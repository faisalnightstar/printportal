<?php
if (file_exists(__DIR__ . '/../admin/pdlm1.php')) {
    include_once(__DIR__ . '/../admin/pdlm1.php');
} else {
    header("Location: ../admin/pdlm1.php");
    exit();
}
