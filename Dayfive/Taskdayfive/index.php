<?php
///function
function mulplipula($x,$y)  {
    $z=$x*$y;
echo "the mulipule of =".$z;
 return $z;

}
$x2=4;
$x4=8;

echo mulplipula($x2,$x4);
function mulplipula2($x,$y,$t=5)  {
    $z=$x*$y*$t;
echo "the mulipule of =".$z;
//  return $z;

}
$x2=4;
$x4=8;

echo mulplipula2($x2,$x4,7);
///unsetfuction
$greet = function($name) {
    echo "hello $name <br>";
};


$greet("World");  
$greet("Alice"); 
$greet("Bob");
var_dump(is_callable($greet));///return true orfalse
 ///call function from html 
function button1() {
    echo "Button 1 was clicked <br>";
}

function button2() {
    echo "Button 2 was clicked <br>";
}
///to ruturn arrey from agrment
function vadiatian_fun($nonvalidat,...$arg){
    var_dump(($arg));
}
vadiatian_fun("hello","rr",4,55,TRUE);
///
function mul($x,$y){
    return $x*$y;
    echo 'This line will never executed';
    }
    $res=mul(5,6);
    echo $res.
    "<br>";
    //call by value
    function add($x,$y){
        $z=$x+$y;
        return $z;
        }
        $res=add(5,6);
        echo $res.
        "<br>";
        //call by reference
        function add2(&$x, $y) {
            $z = $x + $y;
            return $z;
        }
        
        $a = 5;
        $res = add2($a, 6);
        echo $res . "<br>";
///Closures and external variables.
      
$quantity =1;
#use special keywordto use the variable form outside
$calculator =function($number)use($quantity){
return $number + $quantity;
};
var_dump($calculator(7));

///class
class Person {
    public $name;
    public $email;
    public $address;

    function sayHello() {
        echo "Hello " . $this->name;
    }
}

$p = new Person();
$p->name = "Test";
$p->sayHello();
///how to use data from private by set and get
class Person2 {
    public $name;
    private $first_name;
    protected $last_name;
function __contractor(){
    $this->name=$name;
$this->frist_name=$frist_name;
$this->last_name=$last_name;
}
    private function sayHello() {
        echo "Hello " . $this->name . "<br>";
        echo "Hello " . $this->first_name . "<br>";
        echo "Hello " . $this->last_name . "<br>";
    }

    public function setNames($name, $first_name, $last_name) {
        $this->name = $name;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }


    public function greet() {
        $this->sayHello();
    }
    function destruct(){
        echo "<br> Hello in by page";
        }
}

$p = new Person2();
$p->setNames("Yasmeen", "Mohamed", "Said");
$p->greet();




?>
<!-- ///call function from html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call PHP Functions from HTML</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="button1" value="Call Button 1 Function">
        <input type="submit" name="button2" value="Call Button 2 Function">
    </form>

    <?php
    
    if (isset($_POST['button1'])) {
        button1();
    } elseif (isset($_POST['button2'])) {
        button2();
    }
    ?>
</body>
</html>
