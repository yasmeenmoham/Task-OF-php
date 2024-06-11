<?php
session_start();

// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Change this if your database uses a different username
define('DB_PASSWORD', 'YAYA188200@aa'); // Change this if your database uses a different password
define('DB_NAME', 'php'); // Change this to your database name

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Retrieve user data from the database
try {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

// Function to handle editing a user record
function editUser($userId) {
    // Implement edit functionality here
    // Redirect or load appropriate edit page
}

// Function to handle deleting a user record
function deleteUser($userId) {
    // Implement delete functionality here
    // Redirect back to dashboard after deletion
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Button Styling */
        button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main">
        <section class="dashboard">
            <div class="container">
                <div class="dashboard-content">
                    <h2 class="dashboard-title">User Dashboard</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <button onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
                                        <button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

    <!-- Add your JavaScript functions here -->
    <script>
        function editUser(userId) {
            // Call PHP function to handle editing user
            window.location.href = 'editinpod.php?userId=' + userId;
        }

        function deleteUser(userId) {
        // Confirm deletion
        if (confirm("Are you sure you want to delete this user?")) {
            // Send AJAX request to delete.php with the user ID
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deletepod.php?id=" + userId, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the server
                    alert(xhr.responseText); // Show response from server
                    // Optionally, you can reload the page or update the user list after successful deletion
                }
            };
            xhr.send();
        }
    }
    </script>
</body>
</html>
