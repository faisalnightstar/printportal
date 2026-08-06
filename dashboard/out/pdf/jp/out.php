<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/jp/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/jp/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/jp/out.php");
    exit();
}
