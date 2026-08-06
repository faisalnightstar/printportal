<?php
if (file_exists(__DIR__ . '/../../admin/vm/votar5.php')) {
    include_once(__DIR__ . '/../../admin/vm/votar5.php');
} else {
    header("Location: ../../admin/vm/votar5.php");
    exit();
}
