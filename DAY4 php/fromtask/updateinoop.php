<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $firstname = $_POST["firstname"];
            $email = $_POST["email"];

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

            // Prepare and execute SQL statement to update user data
            $sql = "UPDATE users SET firstname='$firstname' WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
                // Display alert message using JavaScript
                echo '<script>alert("User data updated successfully");</script>';
            } else {
                // Display error message using JavaScript
                echo '<script>alert("Error updating user data: ' . $conn->error . '");</script>';
            }

            // Close connection
            $conn->close();
        }
        ?>
        <form  method="post">
            <div class="form-group">
                <label for="name">firstname:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter name" required value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Update User" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>

<style>
    .container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>