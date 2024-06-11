<?php

// Define an array
$array = array("apple", "banana", "orange", "grape", "kiwi");

// Function: ucfirst - Capitalize the first letter of each word in a string
$ucfirst_array = array_map('ucfirst', $array);
echo "ucfirst: " . implode(", ", $ucfirst_array) . "<br>";

// Function: implode - Join array elements with a string
$string = implode(" - ", $array);
echo "implode: " . $string . "<br>";

// Function: explode - Split a string by a string
$string_to_explode = "apple,banana,orange,grape,kiwi";
$exploded_array = explode(",", $string_to_explode);
echo "explode: ";
print_r($exploded_array);
echo "<br>";

// Function: nl2br - Insert HTML line breaks before all newlines in a string
$string_with_newlines = "Hello\nWorld!";
echo "nl2br: " . nl2br($string_with_newlines) . "<br>";

// Function: printf 
$number = 10;
printf("The number is %d.<br>", $number);

// Function: strtok 
$string_to_tokenize = "apple,banana,orange,grape,kiwi";
$token = strtok($string_to_tokenize, ",");
while ($token !== false) {
    echo "strtok: " . $token . "<br>";
    $token = strtok(",");
}

// Function: join
$joined_string = join(", ", $array);
echo "join: " . $joined_string . "<br>";

// Function: substr - Return part of a string
$substring = substr($string, 0, 10);
echo "substring: " . $substring . "<br>";

?>
