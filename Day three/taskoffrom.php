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
    // Validate first name
    if (empty($_POST["firstName"])) {
        $errors[] = "First name is required";
    } else {
        $firstName = validate_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            $errors[] = "Only letters and white space allowed in first name";
        }
    }

    // Validate last name
    if (empty($_POST["lastName"])) {
        $errors[] = "Last name is required";
    } else {
        $lastName = validate_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
            $errors[] = "Only letters and white space allowed in last name";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = validate_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }

    // Validate phone number
    if (empty($_POST["phoneNumber"])) {
        $errors[] = "Phone number is required";
    } else {
        $phoneNumber = validate_input($_POST["phoneNumber"]);
        if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
            $errors[] = "Invalid phone number format";
        }
    }

    // Validate year of graduation
    if (empty($_POST["yearOfGraduation"])) {
        $errors[] = "Year of graduation is required";
    } else {
        $yearOfGraduation = validate_input($_POST["yearOfGraduation"]);
    }

    // Validate university
    if (empty($_POST["university"])) {
        $errors[] = "University is required";
    } else {
        $university = validate_input($_POST["university"]);
    }

    // Validate agree terms
    if (!isset($_POST["agreeTerms"])) {
        $errors[] = "You must agree to the terms and conditions";
    }

    // Validate and upload image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_extensions = array("jpeg", "jpg", "png");
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Only JPEG, JPG, and PNG files are allowed";
        }

        if ($file_size > 500000) {
            $errors[] = "File size must be less than 500 KB";
        }

        if (empty($errors)) {
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            move_uploaded_file($file_tmp, $upload_dir . $file_name);
        }
    } else {
        $errors[] = "Image is required";
    }

    if (empty($errors)) {
        // Set cookies
        setcookie("firstName", $firstName, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("lastName", $lastName, time() + (86400 * 30), "/");
        setcookie("email", $email, time() + (86400 * 30), "/");
        setcookie("phoneNumber", $phoneNumber, time() + (86400 * 30), "/");
        setcookie("yearOfGraduation", $yearOfGraduation, time() + (86400 * 30), "/");
        setcookie("university", $university, time() + (86400 * 30), "/");

        // Set session
        $_SESSION["firstName"] = $firstName;
        $_SESSION["lastName"] = $lastName;
        $_SESSION["email"] = $email;
        $_SESSION["phoneNumber"] = $phoneNumber;
        $_SESSION["yearOfGraduation"] = $yearOfGraduation;
        $_SESSION["university"] = $university;

        $file_path = "registrations.txt";

        // Write user data to the file
        $user_data = "First Name: $firstName, Last Name: $lastName, Email: $email, Phone Number: $phoneNumber, Year of Graduation: $yearOfGraduation, University: $university, Image: $file_name\n";
        file_put_contents($file_path, $user_data, FILE_APPEND);

        // Save user data to localStorage
        $user_data = array(
            "firstName" => $firstName,
            "lastName" => $lastName,
            "email" => $email,
            "phoneNumber" => $phoneNumber,
            "yearOfGraduation" => $yearOfGraduation,
            "university" => $university,
            "image" => $file_name
        );

        // Convert user data to JSON
        $user_data_json = json_encode($user_data);

        // Save JSON data to localStorage
        echo "<script>";
        echo "localStorage.setItem('userData', '$user_data_json');";
        echo "</script>";

        // Redirect
        header("Location: Scandpage.php");
        exit();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    .container {
      position: relative;
    }

    .center-content {
      position: absolute;
      top: 0%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      margin-top: 41px;
    }
    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"],
    .form-group select,
    .form-group textarea {
        width: calc(100% - 50px); /* Adjust width as needed */
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-row {
        display: flex;
        justify-content: space-between; /* Adjust alignment as needed */
    }

    .form-group {
        flex: 0 0 calc(50% - 10px); /* Adjust width as needed */
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"],
    .form-group select,
    .form-group textarea {
        width: 100%; /* Input width */
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .error-message {
        color: red;
        font-size: 0.9em;
    }
    button:hover {
        background-color: antiquewhite;
    }
    button:hover {
        background-color: lightblue;
    }
</style>
</head>
<body>
    <div class="container" style="max-width: 677px;
        padding: 9px;
        margin-top: 41px;
        border: 4px solid white;
        border-radius: 27px;
        height: 820px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);    max-width: 700px;
        padding: 9px;
        margin-top: 41px;
        border: 4px solid white;
        border-radius: 27px;
        height: 930px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    ">
       
        <div class="center-content">
            <i class="fas fa-user-graduate" style="font-size: 36px;color: cadetblue;"></i>
            <a style="margin-top: 10px; color: cadetblue; font-size: 20px;">YourEvent</a>
        </div>
        <br>
        <h2 style="justify-content: center;
        display: flex;
        padding: 10px;
        font-weight: 300;
        background-color: whitesmoke;
        margin-top: 48px;
        ">Registration Form</h2>
        <form id="registrationForm"  method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required>
            <span class="error-message" id="firstNameMessage"></span>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required>
            <span class="error-message" id="lastNameMessage"></span>
        </div>
    </div>
   
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
        <span class="error-message" id="emailMessage"></span>
    </div>
    <div class="form-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
        <span class="error-message" id="phoneNumberMessage"></span>
    </div>
    <div class="form-group">
        <label for="yearOfGraduation">Year of Graduation</label>
        <select class="form-control" id="yearOfGraduation" name="yearOfGraduation" required>
            <option value="">Select year of graduation</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
        </select>
        <span class="error-message" id="yearOfGraduationMessage"></span>
    </div>
    <div class="form-group">
        <label for="university">University</label>
        <select class="form-control" id="university" name="university" required>
            <option value="">Select university</option>
            <option value="University 1">Assuit</option>
            <option value="University 2">Cairo</option>
            <option value="University 3">Minya</option>
        </select>
        <span class="error-message" id="universityMessage"></span>
    </div>
    <div class="form-group">
        <label for="profileImage">Profile Image</label>
        <input type="file" class="form-control-file" id="profileImage" name="image">
        <span class="error-message" id="profileImageMessage"></span>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="agreeTerms" name="agreeTerms" required>
        <label class="form-check-label" for="agreeTerms">I agree to the <a href="" style="color: blue;">terms and conditions</a></label>
        <span class="error-message" id="agreeTermsMessage"></span>
    </div>
    
    <button type="submit" class="btn btn-primary" style=" width: 187px;
    height: 50px;
    background-color: cadetblue;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: auto" onclick="showAlert()">Register</button>
</form>
    </div>

</body>
</html>


<script>
function showAlert() {
    alert("Registration successful!");
}
</script>