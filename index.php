<!DOCTYPE html>
<html>
<body>
<?php
    $nameErr = "";
    $name = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) $nameErr = "Name is required";
        else 
            $name = $_POST["name"];
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) $nameErr = "Only letters and white space allowed";
    }
?>

<form action="index.php" method="post">
    Name: <input type="name" name="name" value="">
    <span style="color: red"><?php echo $nameErr ?></span>
    <br><br>
    <button type="submit">Submit</button>
</form>

Your Input: 
<br><br>
Name: <?php echo $name ?>


</body>
</html>
