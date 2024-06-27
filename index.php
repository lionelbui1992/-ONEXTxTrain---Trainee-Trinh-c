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

        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Nam11', 'Tran222', 'trannn@gmail.com');";
        $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('da', 'aa', 'aaaa@gmail.com');";
            
        if ($conn->multi_query($sql) === TRUE) {
            echo "Create successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        $conn->close();
    ?>
</body>
</html>
