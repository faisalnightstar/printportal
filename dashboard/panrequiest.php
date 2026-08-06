<?php
if (file_exists(__DIR__ . '/../admin/panrequiest.php')) {
    include_once(__DIR__ . '/../admin/panrequiest.php');
} else {
    header("Location: ../admin/panrequiest.php");
    exit();
}
