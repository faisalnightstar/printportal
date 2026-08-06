<?php
if (file_exists(__DIR__ . '/../../../../admin/out/pdf/ng/out.php')) {
    include_once(__DIR__ . '/../../../../admin/out/pdf/ng/out.php');
} else {
    header("Location: ../../../../admin/out/pdf/ng/out.php");
    exit();
}
