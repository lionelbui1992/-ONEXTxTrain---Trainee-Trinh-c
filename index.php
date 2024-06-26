<!DOCTYPE html>
<html>
<body>
<?php
$pattern = '/[a-z]/';
$subject = 'abcd';
if (preg_match($pattern, $subject)) echo 'true';

$pattern2 = '/[0-9]/';
$subject2 = '1,2,4,6';
if(preg_match($pattern2, $subject2)) echo "true";
?> 

</body>
</html>
