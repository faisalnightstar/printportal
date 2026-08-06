<?php
if (file_exists(__DIR__ . '/../admin/ayousmanreacherge.php')) {
    include_once(__DIR__ . '/../admin/ayousmanreacherge.php');
} else {
    header("Location: ../admin/ayousmanreacherge.php");
    exit();
}
