<?php
if (file_exists(__DIR__ . '/../../admin/vm/config.php')) {
    include_once(__DIR__ . '/../../admin/vm/config.php');
} else {
    header("Location: ../../admin/vm/config.php");
    exit();
}
