<?php
if (file_exists(__DIR__ . '/../admin/wallet.php')) {
    include_once(__DIR__ . '/../admin/wallet.php');
} else {
    header("Location: ../admin/wallet.php");
    exit();
}
