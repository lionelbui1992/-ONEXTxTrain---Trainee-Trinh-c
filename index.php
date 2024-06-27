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

        $sql = "SELECT * FROM MyGuests WHERE lastname = 'aa'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " -firstname: " . $row["firstname"] . " -lastname: " . $row["lastname"] . "<br>";
            }
        } else echo "0 results";

        $conn->close();
    ?>
</body>
</html>
