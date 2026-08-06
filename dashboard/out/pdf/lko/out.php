<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/lko/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/lko/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/lko/out.php");
    exit();
}
