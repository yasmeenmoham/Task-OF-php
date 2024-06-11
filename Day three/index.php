<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
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
        }
        h1 {
            color: #333;
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<form  method="POST" enctype="multipart/form-data">
    <h1>Upload Image</h1>
    <label for="image">Choose an image to upload:</label>
    <input type="file" id="image" name="file" required>
    <input type="submit" value="Upload Image">
</form>

</body>
</html>

<?php
if(isset($_FILES['file'])){
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $extensions = array("jpeg","jpg","png","pdf","doc","txt");

    if(in_array($file_ext, $extensions) === false){
        $errors[] = "extension not allowed, please choose a JPEG, JPG, PNG, PDF, DOC, or TXT file.";
    }

    if($file_size > 500000){
        $errors[] = 'File size must be less than 500 KB';
    }

    if(empty($errors) == true){
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        move_uploaded_file($file_tmp, $upload_dir . $file_name);
        echo "Success: File uploaded to " . $upload_dir . $file_name;
    } else {
        foreach($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>