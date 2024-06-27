<?php
    $cookie_name = "Duoc";
    $cookie_value = "24tuoi";
    setcookie($cookie_name, $cookie_value, time() + 600, "/");
?>
<!DOCTYPE html>
<html>
<body>
    <?php
        if(isset($_COOKIE[$cookie_name])) echo "Welcome " . $_COOKIE[$cookie_name];
        else echo "not value"; 
    ?>
</body>
</html>
