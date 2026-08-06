<?php
if (file_exists(__DIR__ . '/../admin/voterd new 2022.php')) {
    include_once(__DIR__ . '/../admin/voterd new 2022.php');
} else {
    header("Location: ../admin/voterd new 2022.php");
    exit();
}
