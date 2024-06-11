<?php
$servername = "localhost";
$username = "root";
$password = "YAYA188200@aa";
$database = "myphp"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create a table
// $sql = "CREATE TABLE users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// // Execute SQL query to create the table
// if ($conn->query($sql) === TRUE) {
//     echo "Table 'users' created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// // Close connection
// $conn->close();


// $sql = "INSERT INTO users (firstname, lastname, email)
//         VALUES ('John', 'Doe', 'john@example.com'),
//                ('Jane', 'Smith', 'jane@example.com'),
//                ('Mike', 'Johnson', 'mike@example.com')";

// if ($conn->query($sql) === TRUE) {
//     echo " data inserted successfully";
// } else {
//     echo "Error inserting fake data: " . $conn->error;
// }
$result = mysqli_query($conn, "SELECT * FROM users");

// Check if there are any rows in the result
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
    // Output data of each row
    while ($row = mysqli_fetch_object($result)) {
        echo "<tr>";
        echo "<td>" . $row->id . "</td>";
        echo "<td>" . $row->firstname . "</td>";
        echo "<td>" . $row->lastname . "</td>";
        echo "<td>" . $row->email . "</td>";
        echo "<td>";
        // Update button
        echo "<a href='updateinoop.php?id=" . $row->id . "' class='btn btn-primary'>Update</a>";
        // Delete button
        echo "<a href='indexdeleteoop.php?id=" . $row->id . "' class='btn btn-danger'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    .btn {
    padding: 8px 16px; /* Add padding to each button */
    margin-right: 10px; /* Add margin to separate the buttons */
}

/* Style for the Update button */
.btn-primary {
    background-color: #007bff; /* Set background color */
    color: #fff; /* Set text color */
    border-radius: 4px;
    background:orange;
    text-decoration: none;
}

/* Style for the Delete button */
.btn-danger {
    background-color: #007bff; /* Set background color */
    color: #fff; /* Set text color */
    border-radius: 4px;
    background:orange;
    text-decoration: none;
}

/* Hover effect for the buttons */
.btn:hover {
    opacity: 0.8; /* Reduce opacity on hover */
}
</style>
