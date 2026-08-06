<?php
/**
 * Database Configuration & Auto-Migration Gateway
 */

// 1. Load .env configuration if present
$rootDir = __DIR__;
$envPath = $rootDir . '/.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim(trim($value), '"\'');
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}

// 2. Primary database connection details
$Server   = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "u859332932_usr_nppDB";
$password = getenv('DB_PASS') ?: "usr_nppDB2026@#";
$database = getenv('DB_NAME') ?: "u859332932_nprintportalDB";

// 3. Fallback credentials cascade for different deployment environments
$db_credentials = [
    ['host' => $Server, 'user' => $username, 'pass' => $password, 'db' => $database],
    ['host' => 'localhost', 'user' => 'u859332932_usr_nppDB', 'pass' => 'usr_nppDB2026@#', 'db' => 'u859332932_nprintportalDB'],
    ['host' => 'localhost', 'user' => 'u859332932_nprintportalDB', 'pass' => 'usr_nppDB2026@#', 'db' => 'u859332932_nprintportalDB'],
    ['host' => 'localhost', 'user' => 'u964961549_farook', 'pass' => 'Farook2026@#', 'db' => 'u964961549_services'],
    ['host' => 'localhost', 'user' => 'u929844834_sevicep', 'pass' => 'Nidiprint@12', 'db' => 'u929844834_sevicep']
];

if (function_exists('mysqli_report')) {
    @mysqli_report(MYSQLI_REPORT_OFF);
}

$connection = false;
foreach ($db_credentials as $cred) {
    if (empty($cred['user']) || empty($cred['db'])) continue;
    try {
        $conn_test = @mysqli_connect($cred['host'], $cred['user'], $cred['pass'], $cred['db']);
        if ($conn_test && ($conn_test instanceof mysqli) && @mysqli_ping($conn_test)) {
            $connection = $conn_test;
            $Server     = $cred['host'];
            $username   = $cred['user'];
            $password   = $cred['pass'];
            $database   = $cred['db'];
            break;
        }
    } catch (Throwable $e) {}
}

if (!$connection && PHP_SAPI !== 'cli') {
    @error_log("Database Connection Failed: " . mysqli_connect_error());
}

// 4. Auto-create tbluser table if missing
if ($connection && ($connection instanceof mysqli)) {
    $create_tbluser_sql = "CREATE TABLE IF NOT EXISTS `tbluser` (
      `userid` INT(11) NOT NULL AUTO_INCREMENT,
      `fullname` VARCHAR(255) DEFAULT NULL,
      `usertype` VARCHAR(50) DEFAULT 'RETAILER',
      `loginname` VARCHAR(100) NOT NULL,
      `emailid` VARCHAR(100) DEFAULT NULL,
      `adhaarno` VARCHAR(20) DEFAULT NULL,
      `address` TEXT DEFAULT NULL,
      `cityname` VARCHAR(100) DEFAULT NULL,
      `statename` VARCHAR(100) DEFAULT NULL,
      `mobileno` VARCHAR(20) DEFAULT NULL,
      `pswrd` VARCHAR(255) DEFAULT NULL,
      `remarks` TEXT DEFAULT NULL,
      `walletamount` DECIMAL(10,2) DEFAULT 0.00,
      `findwallet` DECIMAL(10,2) DEFAULT 0.00,
      `loginid` INT(11) DEFAULT 1,
      `logdate` DATETIME DEFAULT CURRENT_TIMESTAMP,
      `refrenceid` INT(11) DEFAULT 1,
      `userrate` INT(11) DEFAULT 1,
      `aadharpoint` INT(11) DEFAULT 1,
      `ispaid` INT(11) DEFAULT 1,
      `status` INT(11) DEFAULT 1,
      PRIMARY KEY (`userid`),
      UNIQUE KEY `loginname` (`loginname`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    @mysqli_query($connection, $create_tbluser_sql);
}
?>