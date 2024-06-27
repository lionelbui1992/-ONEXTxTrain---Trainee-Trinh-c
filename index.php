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

        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $firstname, $lastname, $email);


        $firstname = "Thanh";
        $lastname = "Nguyen";
        $email = "thanh@gmail.com";
        $stmt->execute();

        $firstname = "Lan";
        $lastname = "Nguyen";
        $email = "lan@gmail.com";
        $stmt->execute();

        $stmt->close();
        $conn->close();
    ?>
</body>
</html>
