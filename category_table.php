<?php
// Database connection parameters
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "mydatabase";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to create the table
    $sql = "CREATE TABLE category (
        category_id INT(11) PRIMARY KEY auto_increment,
        category_name VARCHAR(255) NOT NULL,
        category_status VARCHAR(50) NOT NULL
    )";
    
    // Execute the query to create the table
    $conn->exec($sql);
    
    echo "Table created successfully";
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?>
