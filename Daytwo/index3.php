<?php
$filehandler=fopen("yasmeen.txt"
,
"r");
$filesize=filesize("yasmeen.txt");
echo $filesize;
while (!feof($filehandler)){
var_dump(fgetcsv($filehandler,3,
"n")); ;
}
fclose( $filehandler);

$data= file("yasmeen.txt");
var_dump($data);
$str="You came to me
in that hour 
of need";
echo($str.
"<br>");
echo "<h2> After applying the function </h2>";
echo(nl2br($str));
$string =" I works at Petra";
$tok = strtok($string,
" ");
while ($tok !== false){
echo "Word=$tok<br/>";
$tok = strtok(" \n\t");
}

?>
