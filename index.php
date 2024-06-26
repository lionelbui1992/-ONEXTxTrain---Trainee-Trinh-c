<!DOCTYPE html>
<html>
<body>
<?php
$fname = "duoc";

function showName($name) {
    return $name;
};

function sum($a, $b) {
    return $a += $b;
};

echo showName($fname);

echo sum(1, 2);
?> 

</body>
</html>
