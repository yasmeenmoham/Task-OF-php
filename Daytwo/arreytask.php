<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array Functions</title>
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
            max-width: 800px;
            width: 100%;
            margin-top: 20px;
        }
        h1 {
            color: orange;
            text-align: center;
        }
        .output {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            overflow: auto;
            max-height: 400px;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>PHP Array Functions Demonstration</h1>
    <div class="output">
        <?php
        //  array
        $array = ["orange", "banana", "apple", "raspberry"];

        // 1. compact 
        $color = "red";
        $fruit = "apple";
        $compactArray = compact("color", "fruit");
        echo "<h3>compact</h3><pre>";
        print_r($compactArray);
        echo "</pre>";

        // 2. sort
        sort($array);
        echo "<h3>sort</h3><pre>";
        print_r($array);
        echo "</pre>";

        // 3. usort (user-defined comparison function)
        function compare_length($a, $b) {
            return strlen($a) - strlen($b);
        }
        usort($array, "compare_length");
        echo "<h3>usort (by length)</h3><pre>";
        print_r($array);
        echo "</pre>";

        // 4. shuffle
        shuffle($array);
        echo "<h3>shuffle</h3><pre>";
        print_r($array);
        echo "</pre>";

        // 5. array_flip
        $flippedArray = array_flip($array);
        echo "<h3>array_flip</h3><pre>";
        print_r($flippedArray);
        echo "</pre>";

        // 6. array_walk
        function append_suffix(&$value, $key) {
            $value .= "_suffix";
        }
        array_walk($array, "append_suffix");
        echo "<h3>array_walk</h3><pre>";
        print_r($array);
        echo "</pre>";

        // 7. array_chunk
        $chunkedArray = array_chunk($array, 2);
        echo "<h3>array_chunk (2)</h3><pre>";
        print_r($chunkedArray);
        echo "</pre>";

        // 8. array_combine
        $keys = ["one", "two", "three", "four"];
        $values = ["apple", "banana", "cherry", "date"];
        $combinedArray = array_combine($keys, $values);
        echo "<h3>array_combine</h3><pre>";
        print_r($combinedArray);
        echo "</pre>";

        // 9. array_filter
        function filter_func($value) {
            return strpos($value, "a") !== false;
        }
        $filteredArray = array_filter($values, "filter_func");
        echo "<h3>array_filter (contains 'a')</h3><pre>";
        print_r($filteredArray);
        echo "</pre>";
        ?>
    </div>
</div>
</body>
</html>