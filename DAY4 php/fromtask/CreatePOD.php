<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Change this if your database uses a different username
define('DB_PASSWORD', 'YAYA188200@aa'); // Change this if your database uses a different password
define('DB_NAME', 'php'); // Change this to your database name

try {
    // Attempt to connect to MySQL database
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful.<br>"; // This line can be removed after testing

    // Create the database if it does not exist
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    $pdo->exec($sql);
    echo "Database created successfully.<br>";

    // Connect to the newly created database
    $pdo->exec("use " . DB_NAME);

    // Create the `users` table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Table 'users' created successfully.<br>";
} catch (PDOException $e) {
    die("ERROR: Could not create database or table. " . $e->getMessage());
}
?>