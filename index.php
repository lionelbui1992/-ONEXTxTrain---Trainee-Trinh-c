<!DOCTYPE html>
<html>
<body>
<?php
$x = " hello world ";
$y = "this is \"php\"";

echo strlen("hello world");
echo str_word_count("hello world");
echo strpos("hello world", "world");
echo strtoupper("hello");

echo str_replace("world", "duoc", $x);

echo strrev($x);

echo trim($x);

echo $y;
?> 

</body>
</html>
