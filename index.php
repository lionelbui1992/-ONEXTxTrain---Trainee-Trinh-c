<?php
    session_start();   
        
    if(!isset($_SESSION["authenticated"])) {
        $_SESSION["status"] = "login to access index page";
        header("Location: login.php");
        exit(0);
    }
?>
<!DOCTYPE html>
<html>
<body>
<?php if(isset($_SESSION["status"])) {
        echo "<h3>" . $_SESSION['status'] . "</h3>";
        unset($_SESSION["status"]);
    }
?>
<?php include "header.php" ?>
<h1 style="text-align: center;">Welcome!!!!</h1>
<?php include "footer.php" ?>
</body>
</html>
