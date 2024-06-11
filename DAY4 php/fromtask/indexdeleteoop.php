<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "YAYA188200@aa";
$database = "myphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute SQL statement to delete the user record
    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No user ID provided";
}

// Close connection
$conn->close();
?>
