<?php
if (file_exists(__DIR__ . '/../../../admin/vm/pvc/config.php')) {
    include_once(__DIR__ . '/../../../admin/vm/pvc/config.php');
} else {
    header("Location: ../../../admin/vm/pvc/config.php");
    exit();
}
