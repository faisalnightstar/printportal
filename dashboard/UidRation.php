<?php
if (file_exists(__DIR__ . '/../admin/UidRation.php')) {
    include_once(__DIR__ . '/../admin/UidRation.php');
} else {
    header("Location: ../admin/UidRation.php");
    exit();
}
