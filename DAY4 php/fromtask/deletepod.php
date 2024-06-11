<?php
// Check if ID parameter is provided in the URL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ID parameter is provided
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Retrieve form data
              $id = $_GET['id'];

        // Database configuration
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root'); // Change this if your database uses a different username
        define('DB_PASSWORD', 'YAYA188200@aa'); // Change this if your database uses a different password
        define('DB_NAME', 'php'); // Change this to your database name

        // Create connection
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement to delete the user record
        $sql = "DELETE FROM users WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user: " . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "No user ID provided";
    }
} else {
    echo "Invalid request method";
}
?>
