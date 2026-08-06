<?php
if (file_exists(__DIR__ . '/../../../admin/voter/voter/votar5.php')) {
    include_once(__DIR__ . '/../../../admin/voter/voter/votar5.php');
} else {
    header("Location: ../../../admin/voter/voter/votar5.php");
    exit();
}
