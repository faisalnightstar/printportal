<?php
if (file_exists(__DIR__ . '/../admin/upi_recharge_modal.php')) {
    include_once(__DIR__ . '/../admin/upi_recharge_modal.php');
} else {
    header("Location: ../admin/upi_recharge_modal.php");
    exit();
}
