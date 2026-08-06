<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/dl/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/dl/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/dl/out.php");
    exit();
}
