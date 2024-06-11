<?php
// $myfile = fopen("yasmeen.txt", "w") or die("Unable to open file!");
// $txt = "Hello in My file \n";
// fwrite($myfile, $txt);
// $txt = "Tasting in Myfile\n";
// fwrite($myfile, $txt);
// fclose($myfile);

// $myfile = fopen("yasmeen.txt", "a") or die("Unable to open file!");
// $txt = "Donald Duck\n";
// fwrite($myfile, $txt);
// $txt = "Goofy Goof\n";
// fwrite($myfile, $txt);
// fclose($myfile);
// @$myfile = fopen("yasmeen2.txt", "r") or die("Unable to open file!");
// echo fread($myfile,filesize("yasmeen.txt"));
// echo filesize("yasmeen2.txt");
// fclose($myfile);




file_put_contents("yasmeen3.txt", "Hello in pagess22");
echo file_get_contents("yasmeen3.txt")."<br>";

echo copy("yasmeen3.txt","yasmeen2.txt")."<br>";
echo file_exists("yasmeen.txt")."<br>";
$file = fopen("yasmeen.txt","r");

// Print current position
echo ftell($file)."<br>";

// Change current position
fseek($file,"15");

// Print current position again
echo "<br>" . ftell($file)."<br>";

fclose($file);
@$myfile1 = fopen("yasmeen3.txt", "r") or die("Unable to open file!");
echo(fgetcsv($myfile1,5,'o')[0])."<br>";

$myfile = fopen("yasmeen3.txt", "a") or die("Unable to open file!");
$txt = "Donald Duck\n";
fwrite($myfile, $txt);
$txt = "Goofy Goof\n";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("yasmeen3.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);

?>