<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/pc/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/pc/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/pc/out.php");
    exit();
}
