<?php
if (file_exists(__DIR__ . '/../../../admin/vm/pvc/voter.php')) {
    include_once(__DIR__ . '/../../../admin/vm/pvc/voter.php');
} else {
    header("Location: ../../../admin/vm/pvc/voter.php");
    exit();
}
