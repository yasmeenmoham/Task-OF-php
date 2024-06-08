<?php

    // Get the form data
    $firstName = $_GET['fname'];
    $lastName = $_GET['lname'];
    $address = $_GET['address'];
    $gender = $_GET['gender'];
  $skills = isset($_GET['skills']) ? $_GET['skills'] : [];

    $username = $_GET['username'];
    $department = $_GET['department'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Submission</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    text-align: center;
  }
  h3 {
    color: #333;
  }
  .info {
    text-align: left;
    margin-top: 20px;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Thank you <?php echo $gender == 'male' ? 'Mr.' : 'Miss'; ?> <?php echo $firstName . ' ' . $lastName; ?></h2>
  <h3>Please Review Your Information</h3>
  <div class="info">
    <p><strong>Name:</strong> <?php echo $firstName . ' ' . $lastName; ?></p>
    <p><strong>Address:</strong> <?php echo $address; ?></p>
    <p><strong>Skills:</strong> <?php echo implode(', ', $skills); ?></p>
    <p><strong>Department:</strong> <?php echo $department; ?></p>
  </div>
</div>

</body>
</html>
