<?php
if (file_exists(__DIR__ . '/../admin/voternew2022listedit.php')) {
    include_once(__DIR__ . '/../admin/voternew2022listedit.php');
} else {
    header("Location: ../admin/voternew2022listedit.php");
    exit();
}
