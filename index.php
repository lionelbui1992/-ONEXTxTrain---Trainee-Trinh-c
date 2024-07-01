<?php
    session_start();   
    require "dbconnect.php";
    if(!isset($_SESSION["authenticated"])) {
        $_SESSION["status"] = "login to access index page";
        header("Location: login.php");
        exit(0);
    }

    
    $sql_getdata = "SELECT * FROM user";
    $result_getdata = mysqli_query($conn, $sql_getdata);
    
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
<table>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>action</th>
    </tr>
    <?php
        if(mysqli_num_rows($result_getdata) > 0) {
            while($row = mysqli_fetch_array($result_getdata)) {
                $id = $row["id"];
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["email"]. "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/delete.php?id=$id'>delete</a>" . "</td></tr>";
            }
        } 
    ?>
</table>

<?php include "footer.php" ?>
</body>
</html>
