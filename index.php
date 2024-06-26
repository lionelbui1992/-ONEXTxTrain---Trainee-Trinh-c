<!DOCTYPE html>
<html>
<body>
<?php
$a = 1;

function myFunc() {
    echo $GLOBALS["a"];
};

myFunc();

?> 

<form action="process.php" method="post">
    input name <input type="text" name="yourName" id=""> <br>
    input email <input type="email" name="yourEmail" id=""> <br>
    <button>Send</button>
</form>

</body>
</html>
