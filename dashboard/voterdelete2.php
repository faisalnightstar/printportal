<?php
if (file_exists(__DIR__ . '/../admin/voterdelete2.php')) {
    include_once(__DIR__ . '/../admin/voterdelete2.php');
} else {
    header("Location: ../admin/voterdelete2.php");
    exit();
}
