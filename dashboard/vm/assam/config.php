<?php
if (file_exists(__DIR__ . '/../../../admin/vm/assam/config.php')) {
    include_once(__DIR__ . '/../../../admin/vm/assam/config.php');
} else {
    header("Location: ../../../admin/vm/assam/config.php");
    exit();
}
