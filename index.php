<!DOCTYPE html>
<html>
<body>
    <?php
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        
        $conn = new mysqli($hostName, $userName, $password);
        if($conn->connect_error) echo "connect failed";

        $sql = "CREATE DATABASE myDB";
        if($conn->query($sql)) echo "create successfully";
        else echo "create failed";

        $conn->close();
    ?>
</body>
</html>
