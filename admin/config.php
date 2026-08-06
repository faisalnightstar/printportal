<?php
if (file_exists(__DIR__ . '/../config.php')) {
    include_once(__DIR__ . '/../config.php');
} else {
    $Server = "localhost";
    $username = "u964961549_farook";
    $password = "Farook2026@#";
    $database = "u964961549_services";

    $connection = @mysqli_connect($Server, $username, $password, $database);
    if (!$connection) {
        $password_alt = "Farook2026@#";
        $database_alt = "u964961549_services";
        $connection = @mysqli_connect($Server, $username, $password_alt, $database_alt);
    }
}

if (!isset($connection) || !($connection instanceof mysqli)) {
    if (isset($conn) && ($conn instanceof mysqli)) {
        $connection = $conn;
    } elseif (isset($mysql) && ($mysql instanceof mysqli)) {
        $connection = $mysql;
    }
}
?>