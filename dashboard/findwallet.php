<?php
if (file_exists(__DIR__ . '/../admin/findwallet.php')) {
    include_once(__DIR__ . '/../admin/findwallet.php');
} else {
    header("Location: ../admin/findwallet.php");
    exit();
}
