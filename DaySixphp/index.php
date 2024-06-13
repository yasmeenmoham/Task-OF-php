
<?php
class Math{
    const pi=3.145657;
    static $mul=1;
    function testSelf(){
        echo self::pi."<br>";
    }
}

$math=new Math();

$math->testSelf();

echo Math::$mul;
//bind between clousre and class 
$myclouser=function(){
    echo $this->property."<br>";
};
// $myclouser("hello in call function"); 
class Myclass{
   public $property;
    function __construct($propertyvalue){
        $this->property=$propertyvalue;//inzitian
     echo "Hello in My Constractor"."<br>";
    }
}
$objclass=new Myclass("hello from clouser");

$myclouser->call($objclass);