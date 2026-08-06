<?php
if (file_exists(__DIR__ . '/../../admin/vm/vn.php')) {
    include_once(__DIR__ . '/../../admin/vm/vn.php');
} else {
    header("Location: ../../admin/vm/vn.php");
    exit();
}
