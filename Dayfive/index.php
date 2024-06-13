 <?php
// function mulplipula($x,$y)  {
//     $z=$x*$y;
// echo "the mulipule of =".$z;
// //  return $z;

// }
// $x2=4;
// $x4=8;

// echo mulplipula($x2,$x4);

// function mulplipula2($x,$y,$t=5)  {
//     $z=$x*$y*$t;
// echo "the mulipule of =".$z;
// //  return $z;

// }
// $x2=4;
// $x4=8;

// echo mulplipula2($x2,$x4,7);

function increamfun($value, $amount = 1) {
    return $value + $amount;
}

// Using increamfun function
$value = 10;
 increamfun($value);
 var_dump( increamfun($value));
echo "New Value (increamfun): " .$value . "\n"; 


// Function to increase value by reference
function increamfun2(&$value, $amount = 1) {
    $value += $amount;
}

// Using increamfun2 function
$value = 10;
increamfun2($value);
echo "New Value (increamfun2): " . $value . "\n";
var_dump(increamfun2($value));
// function setHeight($minheight = 50,$minweight=9) {
//     echo "The  is : $minheight*$minweight <br>";
//   }
//   $minweight3=90;
//   setHeight(350, $minweight3);
//   setHeight( ); 
//   setHeight(135, $minweight3);
function vadiatian_fun($nonvalidat,...$arg){
    var_dump(($arg));
}
vadiatian_fun("hello","rr",4,55,TRUE);

$greet = function($name) {
    echo "hello $name <br>";
};


$greet("World");  
$greet("Alice"); 
$greet("Bob");  
$quantity=1;
$quantity=100;
$cal=function($number)use($quantity)

{
    $quantity++;
   
    return $number+$quantity;
}




?>
