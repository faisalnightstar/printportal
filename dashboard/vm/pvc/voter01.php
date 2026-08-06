<?php
if (file_exists(__DIR__ . '/../../../admin/vm/pvc/voter01.php')) {
    include_once(__DIR__ . '/../../../admin/vm/pvc/voter01.php');
} else {
    header("Location: ../../../admin/vm/pvc/voter01.php");
    exit();
}
