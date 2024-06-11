<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            max-width: 100%;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"], .form-group input[type="email"] {
            width: calc(100% - 10px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-top: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-btn {
            margin-top: 20px;
        }

        .back-btn a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .back-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = $_POST["name"];
            $email = $_POST["email"];
        
            // Database configuration
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root'); // Change this if your database uses a different username
            define('DB_PASSWORD', 'YAYA188200@aa'); // Change this if your database uses a different password
            define('DB_NAME', 'php'); // Change this to your database name
        
            // Create connection
            $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); // Fix here
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Update user information in the database
            $sql = "UPDATE users SET name='$name' WHERE email='$email'";
        
            if ($conn->query($sql) === TRUE) {
                echo "User information updated successfully";
            } else {
                echo "Error updating user information: " . $conn->error;
            }
        
            // Close connection
            $conn->close();
        }?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update User">
            </div>
        </form>
        <div class="back-btn">
            <a href="dachbord.php"><i class="fas fa-chevron-left"></i> Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
