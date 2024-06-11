<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Styled Form</title>
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
  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    margin-top: 100px;
  }
  h1 {
    color: orange;
    text-align: center;
  }
  label {
    font-weight: bold;
 
    margin-bottom: 5px;
   color:black; /* Set your desired color here */
  }
  input[type="text"],
  input[type="password"],
  input[type="number"],
  textarea,
  select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }
  input[type="radio"],
  input[type="checkbox"] {
    margin-right: 10px;
  }
  input[type="text"]:focus,
  input[type="password"]:focus,
  input[type="number"]:focus,
  textarea:focus,
  select:focus {
    border-color: #4caf50;
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
    outline: none;
  }
  .radio-group,
  .checkbox-group {
    margin-bottom: 15px;
  }
  .checkbox-group label {
    display: inline-block;
    margin-right: 10px;
  }
  .buttons {
    display: flex;
    justify-content: space-between;
  }
  input[type="submit"],
  input[type="reset"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 48%;
  }
  input[type="reset"] {
    background-color: #f44336;
  }
  input[type="submit"]:hover,
  input[type="reset"]:hover {
    opacity: 0.9;
  }
</style>
</head>
<body>

<form action="index2.php" method="GET">

  <h1>The Registration Form</h1>
  
  <label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname" required>

  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname" required>

  <label for="address">Address:</label>
  <textarea id="address" name="address" rows="4" required></textarea>

  <label for="code">Please enter the code:</label>
  <input type="text" id="code" name="code" required>

  <label>Gender:</label>
  <div class="radio-group">
    <input type="radio" id="male" name="gender" value="male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female" required>
    <label for="female">Female</label>
  </div>

  <label>Skills:</label>
  <div class="checkbox-group">
    <input type="checkbox" id="sql" name="skills[]" value="SQL">
    <label for="sql">SQL</label>
    <input type="checkbox" id="php" name="skills[]" value="PHP">
    <label for="php">PHP</label><br>
    <input type="checkbox" id="mysql" name="skills[]" value="MySQL">
    <label for="mysql">MySQL</label>
    <input type="checkbox" id="postman" name="skills[]" value="Postman">
    <label for="postman">Postman</label><br>
    <input type="checkbox" id="javascript" name="skills[]" value="JavaScript">
    <label for="javascript">JavaScript</label>
  </div>

  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="department">Department:</label>
  <select id="department" name="department" required>
    <option value="IT">IT</option>
    <option value="HR">HR</option>
    <option value="Finance">Finance</option>
    <option value="Marketing">Marketing</option>
  </select>

  <div class="buttons">
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </div>
</form>

</body>
</html>
