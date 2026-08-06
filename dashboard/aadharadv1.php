<?php
if (file_exists(__DIR__ . '/../admin/aadharadv1.php')) {
    include_once(__DIR__ . '/../admin/aadharadv1.php');
} else {
    header("Location: ../admin/aadharadv1.php");
    exit();
}
