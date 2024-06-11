<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Data</title>
<!-- Bootstrap CSS CDN -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    width: 90%;
  }
  table {
    margin-top: 20px;
  }
</style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Data from MyGuests</h2>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "YAYA188200@aa";
  $db_database = "php";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db_database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT id, firstname, lastname, email, reg_date FROM student";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table class='table table-striped table-hover'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["firstname"] . "</td>";
      echo "<td>" . $row["lastname"] . "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "<td>";
      echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm mr-2'>Edit</a>";
      echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
      echo "</td>";
      echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
  } else {
    echo "<div class='alert alert-warning' role='alert'>0 results</div>";
  }

  $conn->close();
  ?>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
