<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barrizio_charity_db";

// Set DSN (Data Source Name)
$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";

try {
    // Create PDO instance
    $connection = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connection success message (optional)
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}

?>