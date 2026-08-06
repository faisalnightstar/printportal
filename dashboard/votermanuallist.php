<?php
if (file_exists(__DIR__ . '/../admin/votermanuallist.php')) {
    include_once(__DIR__ . '/../admin/votermanuallist.php');
} else {
    header("Location: ../admin/votermanuallist.php");
    exit();
}
