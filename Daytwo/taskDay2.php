<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP File Handling Operations</title>
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
            max-width: 600px;
            width: 100%;
            margin-top: 100px;
        }
        h1 {
            color: orange;
            text-align: center;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
        button:hover {
            opacity: 0.9;
        }
        .output {
            background-color: gray;
            padding: 10px;
            border-radius: 4px; 
            margin-top: 10px;
            overflow: auto;
            max-height: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>PHP File Handling Operations</h1>
    <form method="post">
        <button type="submit" name="operation" value="write">Write to File</button>
        <button type="submit" name="operation" value="append">Append to File</button>
        <button type="submit" name="operation" value="read">Read File</button>
        <button type="submit" name="operation" value="check">Check File Existence</button>
        <button type="submit" name="operation" value="pointer">File Pointer Operations</button>
        <button type="submit" name="operation" value="csv">Read CSV</button>
        <button type="submit" name="operation" value="copy">Copy File</button>
        <button type="submit" name="operation" value="loop">Loop Through File</button>
    </form>
    <div class="output">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $operation = $_POST['operation'];

            switch ($operation) {
                case 'write':
                    $myfile = fopen("yasmeen.txt", "w") or die("Unable to open file!");
                    $txt = "Hello in My file \n";
                    fwrite($myfile, $txt);
                    $txt = "Tasting in Myfile\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                    echo "File written successfully.";
                    break;

                case 'append':
                    $myfile = fopen("yasmeen.txt", "a") or die("Unable to open file!");
                    $txt = "Donald Duck\n";
                    fwrite($myfile, $txt);
                    $txt = "Goofy Goof\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                    echo "File appended successfully.";
                    break;

                case 'read':
                    @$myfile = fopen("yasmeen2.txt", "r") or die("Unable to open file!");
                    if ($myfile) {
                        echo fread($myfile, filesize("yasmeen2.txt"));
                        fclose($myfile);
                    } else {
                        echo "Unable to open yasmeen2.txt";
                    }
                    break;

                case 'check':
                    echo file_exists("yasmeen.txt") ? "yasmeen.txt exists" : "yasmeen.txt does not exist";
                    break;

                case 'pointer':
                    $file = fopen("yasmeen.txt", "r");
                    echo "Current position: " . ftell($file) . "<br>";
                    fseek($file, 15);
                    echo "New position: " . ftell($file);
                    fclose($file);
                    break;

                case 'csv':
                    @$myfile1 = fopen("yasmeen3.txt", "r") or die("Unable to open file!");
                    if ($myfile1) {
                        $csvData = fgetcsv($myfile1, 1000, 'o');
                        if ($csvData !== false) {
                            echo $csvData[0];
                        }
                        fclose($myfile1);
                    }
                    break;

                case 'copy':
                    echo copy("yasmeen3.txt", "yasmeen2.txt") ? "Copy successful" : "Copy failed";
                    break;

                case 'loop':
                    $myfile = fopen("yasmeen3.txt", "r") or die("Unable to open file!");
                    while (!feof($myfile)) {
                        echo fgets($myfile) . "<br>";
                    }
                    fclose($myfile);
                    break;
            }
        }
        ?>
    </div>
</div>

</body>
</html>
