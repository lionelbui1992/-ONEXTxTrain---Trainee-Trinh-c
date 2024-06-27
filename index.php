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
        VALUES ('Duoc', 'Trinh', 'trinhduoc@gmail.com')";
            
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo "Last id is " . $last_id;
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        $conn->close();
    ?>
</body>
</html>
