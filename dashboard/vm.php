<?php
if (file_exists(__DIR__ . '/../admin/vm.php')) {
    include_once(__DIR__ . '/../admin/vm.php');
} else {
    header("Location: ../admin/vm.php");
    exit();
}
