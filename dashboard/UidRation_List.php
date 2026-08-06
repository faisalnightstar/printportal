<?php
if (file_exists(__DIR__ . '/../admin/UidRation_List.php')) {
    include_once(__DIR__ . '/../admin/UidRation_List.php');
} else {
    header("Location: ../admin/UidRation_List.php");
    exit();
}
