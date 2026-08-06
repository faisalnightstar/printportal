<?php
if (file_exists(__DIR__ . '/../admin/recharge.php')) {
    include_once(__DIR__ . '/../admin/recharge.php');
} else {
    header("Location: ../admin/recharge.php");
    exit();
}
