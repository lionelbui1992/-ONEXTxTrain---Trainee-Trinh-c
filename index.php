<!DOCTYPE html>
<html>
<body>
<?php
$a = 5;
$b = "kilometers";
$c = NULL;
$d = NULL;

$a = (string) $a;
$b = (int) $b;
$c = (boolean) $c;
$d = (array) $d;

var_dump($a);

var_dump($b);

var_dump($c);

var_dump($d);
?> 

</body>
</html>
