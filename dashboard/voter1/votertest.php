<?php
if (file_exists(__DIR__ . '/../../admin/voter1/votertest.php')) {
    include_once(__DIR__ . '/../../admin/voter1/votertest.php');
} else {
    header("Location: ../../admin/voter1/votertest.php");
    exit();
}
