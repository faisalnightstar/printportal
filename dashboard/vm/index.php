<?php
if (file_exists(__DIR__ . '/../../admin/vm/index.php')) {
    include_once(__DIR__ . '/../../admin/vm/index.php');
} else {
    header("Location: ../../admin/vm/index.php");
    exit();
}
