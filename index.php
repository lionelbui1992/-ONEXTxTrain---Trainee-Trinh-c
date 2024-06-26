<!DOCTYPE html>
<html>
<body>
<?php
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $gender = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) $nameErr = "Name is required";
        else $name = $_POST["name"];
        if(empty($_POST["email"])) $emailErr = "Email is required";
        else $email = $_POST["email"];
        if(empty($_POST["gender"])) $genderErr = "Gender is required";
        else $gender = $_POST["gender"];
    }
?>
<form action="index.php" method="POST">
Name: <input type="text" name="name">
<span style="color: red"><?php echo $nameErr ?></span>
<br><br>
E-mail: <input type="text" name="email">
<span style="color: red"><?php echo $emailErr ?></span>
<br><br>
Gender: 
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span style="color: red"> <?php echo $genderErr ?></span>
<br><br>
<input type="submit">
</form>

<?php 
    echo "<br>";
    echo "Your Input: ";
    echo "<br>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $gender;
    echo "<br>"; 
?>
</body>
</html>
