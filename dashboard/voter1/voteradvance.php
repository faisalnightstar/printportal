<?php
if (file_exists(__DIR__ . '/../../admin/voter1/voteradvance.php')) {
    include_once(__DIR__ . '/../../admin/voter1/voteradvance.php');
} else {
    header("Location: ../../admin/voter1/voteradvance.php");
    exit();
}
