<?php  
$servername = "localhost";
$username = "root";
$password = "YAYA188200@aa";
$db_database="php";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// $sql = "CREATE TABLE student (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
// if ($conn->query($sql) === TRUE) {
//   echo "Table student created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }
// $sql = "INSERT INTO student (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com'),('Mary', 'Moe', 'Mary@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$sql = "SELECT id, firstname, lastname, email, reg_date FROM student";

$result = $conn->query($sql);

if ($result) {
    $rowCount = mysqli_num_rows($result);
    var_dump($rowCount);
} else {
    echo "Error: " . $conn->error;
}


if ($result->num_rows > 0) {
  echo "<table class='table table-striped table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>First Name</th>";
  echo "<th>Last Name</th>";
  echo "<th>Email</th>";


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
    echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a>";
    echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>";
    echo "</td>";
    echo "</tr>";
  }
  
  echo "</tbody>";
  echo "</table>";
} else {
  echo "0 results";
}
$sql = "UPDATE student SET lastname='Doe' WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$sql = "DELETE FROM student WHERE id=3";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$sql = 'INSERT INTO student (lastname, email, firstname) VALUES ("test", "test", "test")';

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
    echo $conn->insert_id . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();


$sql = "DELETE FROM student WHERE Student_id=26";
if (mysqli_query($conn, $sql)) {
    echo "Query executed successfully" . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>
