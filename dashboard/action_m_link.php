<?php
if (file_exists(__DIR__ . '/../admin/action_m_link.php')) {
    include_once(__DIR__ . '/../admin/action_m_link.php');
} else {
    header("Location: ../admin/action_m_link.php");
    exit();
}
