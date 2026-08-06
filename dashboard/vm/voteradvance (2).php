<?php
if (file_exists(__DIR__ . '/../../admin/vm/voteradvance (2).php')) {
    include_once(__DIR__ . '/../../admin/vm/voteradvance (2).php');
} else {
    header("Location: ../../admin/vm/voteradvance (2).php");
    exit();
}
