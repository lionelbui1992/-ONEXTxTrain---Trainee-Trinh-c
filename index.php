<!DOCTYPE html>
<html>
<body>
    <?php
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";

        $conn = new mysqli($hostName, $userName, $password, $dbName);

        if($conn->connect_error) die("Connect failed " . $conn->connect_error);

        $sql = "SELECT * FROM MyGuests LIMIT 2";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row["id"] . " " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }

        $conn->close();
    ?>
</body>
</html>
