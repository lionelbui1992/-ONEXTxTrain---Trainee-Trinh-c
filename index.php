<!DOCTYPE html>
<html>
<body>
<?php
$int = 10;
$string = "PHP";
$float = 10.1;
$bool = true;
$arr = array("a", "b", "c");

var_dump($int);
echo "<br>";
var_dump($string);
echo "<br>";
var_dump($float);
echo "<br>";
var_dump($bool);
echo "<br>";
var_dump($arr);

echo "<br>";

class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
  }
  
  $myCar = new Car("red", "Volvo");
  var_dump($myCar);
?> 

</body>
</html>
