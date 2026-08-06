<?php
if (file_exists(__DIR__ . '/../../../../../admin/aadhar/phpqrcode/bindings/tcpdf/qrcode.php')) {
    include_once(__DIR__ . '/../../../../../admin/aadhar/phpqrcode/bindings/tcpdf/qrcode.php');
} else {
    header("Location: ../../../../../admin/aadhar/phpqrcode/bindings/tcpdf/qrcode.php");
    exit();
}
