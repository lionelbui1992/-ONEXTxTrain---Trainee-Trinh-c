<?php 
    session_start();
    
    require "dbconnect.php";

    if(isset($_GET["id"])) {
        $delete_id = $_GET["id"];
        $sql_id_delete = "DELETE FROM user WHERE id = '$delete_id'";
        if(mysqli_query($conn, $sql_id_delete)) {
            $_SESSION["status"] = "delete successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION["status"] = "delete failed";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION["status"] = "no id exsist";
        header("Location: index.php");
        exit(0);
    }
?>