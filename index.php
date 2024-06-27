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

        $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            if ($conn->query($sql) === TRUE) {
              echo "Create table successfully";
            } else {
              echo "Error creating table: " . $conn->error;
            }
            
            $conn->close();
    ?>
</body>
</html>
