<?php
if (file_exists(__DIR__ . '/../admin/paymentreq.php')) {
    include_once(__DIR__ . '/../admin/paymentreq.php');
} else {
    header("Location: ../admin/paymentreq.php");
    exit();
}
