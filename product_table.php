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
    $sql = "CREATE TABLE products (
        product_id INT(11) PRIMARY KEY auto_increment,
        product_sku VARCHAR(50) UNIQUE,
        product_name VARCHAR(255) NOT NULL,
        product_category varchar(255) not null,
        product_price varchar(50) NOT NULL,
        product_img varchar(1000) not null
    )";
    
    // Execute the query to create the table
    $conn->exec($sql);
    
    echo "Table created successfully";
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?>
