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

        $sql = "DELETE FROM MyGuests WHERE id = 3";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $conn->close();
    ?>
</body>
</html>
