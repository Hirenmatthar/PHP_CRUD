<?php
// Database connection parameters
$servername = "localhost:3306";
$username = "root";
$password = "";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to create the database
    $sql = "CREATE DATABASE mydatabase";
    
    // Execute the query to create the database
    $conn->exec($sql);
    
    echo "Database created successfully";
} catch(PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}
?>
