<?php
if (file_exists(__DIR__ . '/../admin/votermanual.php')) {
    include_once(__DIR__ . '/../admin/votermanual.php');
} else {
    header("Location: ../admin/votermanual.php");
    exit();
}
