<?php
if (file_exists(__DIR__ . '/../../admin/vm/voter2.php')) {
    include_once(__DIR__ . '/../../admin/vm/voter2.php');
} else {
    header("Location: ../../admin/vm/voter2.php");
    exit();
}
