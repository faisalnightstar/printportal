<?php
if (file_exists(__DIR__ . '/../admin/aadharmanuallist.php')) {
    include_once(__DIR__ . '/../admin/aadharmanuallist.php');
} else {
    header("Location: ../admin/aadharmanuallist.php");
    exit();
}
