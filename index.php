<!DOCTYPE html>
<html>
<body>
<?php
$x = 5;
$y = 10;
echo $x + $y. "<br>";
var_dump($x);

function myTest() {
    $x = 2;
    echo "my number is $x";
};

myTest();

echo "my number is $x";

function myTest2() {
    global $x,  $y;

    $y = $x + $y;
};

myTest2();

echo $y;

function myTest3() {
    static $x = 0;
    echo $x;
    $x++;
}

myTest3();
myTest3();
myTest3();
?> 

</body>
</html>
