<?php

$Server = "localhost";
$username = "u964961549_farook";
$password = "Farook2026@#";
$database = "u964961549_services";

$connection = mysqli_connect($Server, $username, $password, $database);

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}