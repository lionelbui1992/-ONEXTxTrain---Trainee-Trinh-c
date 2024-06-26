<!DOCTYPE html>
<html>
<body>
<?php
$i = 1;
$colors = array("red", "blue", "black", "orange");
$members = array("duoc", "nam", "linh");
while($i < 10) {
    echo $i;
    $i++;
}

echo "<br>";

for($a = 0; $a < 10; $a++) {
    echo $a;
}

echo "<br>";

foreach ($colors as $color) {
    echo $color;
} 

echo "<br>";

foreach ($members as $index => $color) {
    echo "$index: $color" . "<br>";
}


$arrNums = array(1,2,3,4,5,6);
foreach ($arrNums as $num) {
    if($num == 5) break;
    echo $num;
}
?> 

</body>
</html>
