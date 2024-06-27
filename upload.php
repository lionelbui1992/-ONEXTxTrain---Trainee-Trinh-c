<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["yourName"];
        $fileUpload = $_FILES["fileToUpload"]["name"];
        $data = "$name\n$fileUpload";
        $file = fopen("$name.txt", "w");
        fwrite($file, $data);
        fclose($file);
    }
?>