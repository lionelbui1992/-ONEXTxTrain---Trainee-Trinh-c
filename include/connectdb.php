<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "porsche_experience";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn) die("Connect failed " . mysqli_connect_error());
?>