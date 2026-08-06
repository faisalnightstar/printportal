<?php
if (file_exists(__DIR__ . '/../admin/pointtrans.php')) {
    include_once(__DIR__ . '/../admin/pointtrans.php');
} else {
    header("Location: ../admin/pointtrans.php");
    exit();
}
