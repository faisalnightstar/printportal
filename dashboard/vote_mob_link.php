<?php
if (file_exists(__DIR__ . '/../admin/vote_mob_link.php')) {
    include_once(__DIR__ . '/../admin/vote_mob_link.php');
} else {
    header("Location: ../admin/vote_mob_link.php");
    exit();
}
