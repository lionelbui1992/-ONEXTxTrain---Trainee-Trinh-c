<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(empty($_POST["yourName"]) || empty($_POST["yourEmail"])) echo "value is empty";
            else {
                echo $_POST["yourName"] . "<br>";
                echo $_POST["yourEmail"];
            }
        }
    ?>
</body>
</html>