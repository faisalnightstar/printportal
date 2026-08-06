<?php
if (file_exists(__DIR__ . '/../../../admin/vm/pvc/khu.php')) {
    include_once(__DIR__ . '/../../../admin/vm/pvc/khu.php');
} else {
    header("Location: ../../../admin/vm/pvc/khu.php");
    exit();
}
