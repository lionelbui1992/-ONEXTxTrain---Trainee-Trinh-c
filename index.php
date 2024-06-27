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

        $sql = "UPDATE MyGuests SET lastname = 'trang' WHERE id=7";
        $result = $conn->query($sql);

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updated record: " . mysqli_error($conn);
        }

        $conn->close();
    ?>
</body>
</html>
