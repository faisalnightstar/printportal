<?php
if (file_exists(__DIR__ . '/../admin/voternew.php')) {
    include_once(__DIR__ . '/../admin/voternew.php');
} else {
    header("Location: ../admin/voternew.php");
    exit();
}
