<?php
class Person{
    public $name;
    public $email;
    public $address;
    function seyhello(){
        echo "hello".$this->name."<br>";
    }

    function __construct($name,$email) {
        echo $this->name = $name;
       echo $this->email = $email;
      }
function __destruct(){
    echo $this->name;
    echo $this->email;
    echo $this->address;
}
}
$p=new Person();

$p->name="ali";
$p->seyhello();

$p2=new Person();

$p2->name="ola";
$p2->seyhello();
$p3=new Person("ola","ola@gmail.com");
?>