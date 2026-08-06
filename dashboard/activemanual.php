<?php
if (file_exists(__DIR__ . '/../admin/activemanual.php')) {
    include_once(__DIR__ . '/../admin/activemanual.php');
} else {
    header("Location: ../admin/activemanual.php");
    exit();
}
