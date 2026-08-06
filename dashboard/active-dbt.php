<?php
if (file_exists(__DIR__ . '/../admin/active-dbt.php')) {
    include_once(__DIR__ . '/../admin/active-dbt.php');
} else {
    header("Location: ../admin/active-dbt.php");
    exit();
}
