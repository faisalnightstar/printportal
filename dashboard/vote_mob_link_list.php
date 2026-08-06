<?php
if (file_exists(__DIR__ . '/../admin/vote_mob_link_list.php')) {
    include_once(__DIR__ . '/../admin/vote_mob_link_list.php');
} else {
    header("Location: ../admin/vote_mob_link_list.php");
    exit();
}
