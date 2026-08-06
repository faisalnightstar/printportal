<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/db/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/db/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/db/out.php");
    exit();
}
