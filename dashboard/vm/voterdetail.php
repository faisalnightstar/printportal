<?php
if (file_exists(__DIR__ . '/../../admin/vm/voterdetail.php')) {
    include_once(__DIR__ . '/../../admin/vm/voterdetail.php');
} else {
    header("Location: ../../admin/vm/voterdetail.php");
    exit();
}
