<!DOCTYPE html>
<html>
<body>
    <?php
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "dbtraining";
        $connect = new mysqli($hostName, $userName, $password, $dbName);
        if($connect->connect_error) echo "khong thanh cong";
        echo "thanh cong";
    ?>
</body>
</html>
