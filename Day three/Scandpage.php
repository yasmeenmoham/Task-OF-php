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
  <h2>Thank you for your submission</h2>
  <h3>Please Review Your Information</h3>
  <div class="info">
    <p><strong>First Name:</strong> <?php echo isset($_COOKIE['firstName']) ? htmlspecialchars($_COOKIE['firstName']) : ''; ?></p>
    <p><strong>Last Name:</strong> <?php echo isset($_COOKIE['lastName']) ? htmlspecialchars($_COOKIE['lastName']) : ''; ?></p>
    <p><strong>Email:</strong> <?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?></p>
    <p><strong>Phone Number:</strong> <?php echo isset($_COOKIE['phoneNumber']) ? htmlspecialchars($_COOKIE['phoneNumber']) : ''; ?></p>
    <p><strong>Year of Graduation:</strong> <?php echo isset($_COOKIE['yearOfGraduation']) ? htmlspecialchars($_COOKIE['yearOfGraduation']) : ''; ?></p>
    <p><strong>University:</strong> <?php echo isset($_COOKIE['university']) ? htmlspecialchars($_COOKIE['university']) : ''; ?></p>
  </div>
</div>

</body>
</html>
