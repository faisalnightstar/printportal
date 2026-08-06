<?php
if (file_exists(__DIR__ . '/../../admin/vm/voter3.php')) {
    include_once(__DIR__ . '/../../admin/vm/voter3.php');
} else {
    header("Location: ../../admin/vm/voter3.php");
    exit();
}
