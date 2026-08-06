<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/mrd/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/mrd/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/mrd/out.php");
    exit();
}
