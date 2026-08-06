<?php
if (file_exists(__DIR__ . '/../admin/voterlist.php')) {
    include_once(__DIR__ . '/../admin/voterlist.php');
} else {
    header("Location: ../admin/voterlist.php");
    exit();
}
