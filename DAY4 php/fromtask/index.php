<?php
session_start();

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required";
    } else {
        $name = validate_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $errors["name"] = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = validate_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email format";
        }
    }

    // Validate password
    if (empty($_POST["pass"])) {
        $errors["pass"] = "Password is required";
    } else {
        $pass = validate_input($_POST["pass"]);
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
            $errors["pass"] = "Password must be at least 8 characters long and contain at least one letter and one number";
        }
    }

    // Validate repeat password
    if (empty($_POST["re_pass"])) {
        $errors["re_pass"] = "Please repeat the password";
    } else {
        $re_pass = validate_input($_POST["re_pass"]);
        if ($pass !== $re_pass) {
            $errors["re_pass"] = "Passwords do not match";
        }
    }

    // Validate agree-term checkbox
    if (!isset($_POST["agree-term"])) {
        $errors["agree-term"] = "You must agree to the terms of service";
    }

    // Database configuration
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root'); // Change this if your database uses a different username
    define('DB_PASSWORD', 'YAYA188200@aa'); // Change this if your database uses a different password
    define('DB_NAME', 'php'); // Change this to your database name

    // Attempt to connect to MySQL database
    try {
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connection successful.<br>"; // This line can be removed after testing
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    if (empty($errors)) {
        // Insert data into database
        try {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            //  $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

            // Execute the statement
            if ($stmt->execute()) {
                $_SESSION["registration_success"] = true;
                header("Location: dachbord.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        } catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"/>
                                <span class="error"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
                                <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                                <span class="error"><?php echo isset($errors['pass']) ? $errors['pass'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                                <span class="error"><?php echo isset($errors['re_pass']) ? $errors['re_pass'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" <?php echo isset($_POST['agree-term']) ? 'checked' : ''; ?>/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to all statements in <a href="#" class="term-service">Terms of service</a></label>
                                <span class="error"><?php echo isset($errors['agree-term']) ? $errors['agree-term'] : ''; ?></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="dachbord.php" class="signup-image-link">I am already a member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>




    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>