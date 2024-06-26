<!DOCTYPE html>
<html>
<body>
<?php
    $emailErr = $email = "";
    $urlErr = $url = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["email"])) $emailErr = "Email is required";
        else 
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Email not valid";

        if(empty($_POST["path"])) $urlErr = "Url is required";
        else
            $url = $_POST["path"];    
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) $urlErr = "URL not valid";
    }
?>

<form action="index.php" method="post">
    Email: <input type="email" name="email" value="">
    <span style="color: red"><?php echo $emailErr ?></span>
    <br><br>
    URL: <input type="text" name="path" value="">
    <span style="color: red"><?php echo $urlErr ?></span>
    <br><br>
    <button type="submit">Submit</button>
</form>

Your Input: 
<br><br>
Email: <?php echo $email ?>
<br><br>
URL: <?php echo $url ?>

</body>
</html>
