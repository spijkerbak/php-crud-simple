<?php
// UTF-8 NΟ BOM

// disable caching in browsers and proxies 
// to prevent stale data after refresh or redirect
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// connection parameters to local database could be:
$dsn = 'mysql:dbname=crud;host=localhost;charset=utf8'; // no hyphen in utf8
$user = 'root';
$pass = '';

// my connection paramaters are secret
include 'db-settings.php';

// connect to database
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('connection failed: ' . $e->getMessage());
}

// enable error messages
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// function to call after execution of statement
function checkSQL($stmt) {
    $info = $stmt->errorInfo();
    if ($info[0] != '00000') {
        echo $info[2];
        exit;
    }
}
