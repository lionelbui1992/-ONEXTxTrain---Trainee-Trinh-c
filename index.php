<!DOCTYPE html>
<html>
<body>
<?php
echo __DIR__;
echo __FILE__;

function myFunc() {
    return __FUNCTION__;
}

echo myFunc();
?> 

</body>
</html>
