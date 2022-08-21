<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "shorturl";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_CASE => PDO::CASE_NATURAL,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
];

// Now you create your connection string
try {
    // Then pass the options as the last parameter in the connection string
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $password, $options);
    
    // That's how you can set multiple attributes
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

date_default_timezone_set('Asia/Bangkok');
