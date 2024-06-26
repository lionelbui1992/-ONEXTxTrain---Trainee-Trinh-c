<!DOCTYPE html>
<html>
<body>
<?php
$arr = array("duoc", "long", "nam");
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
$cars = ["Volvo", "BMW", "Toyota"];
$nums = [1,8,3,2];

echo count($arr);
echo "<br>";

array_push($arr, "van");
var_dump($arr);

echo $car["year"] = 2000;

var_dump($car);
echo "<br>";
foreach ($cars as $index => $c) {
    echo $index;
};

$cars[1] = "Honda";


array_push($cars, "KIA");

var_dump($cars);

sort($nums);

var_dump($nums);

?> 

</body>
</html>
