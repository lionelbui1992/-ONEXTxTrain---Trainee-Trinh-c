<?php 
    session_start();
    unset($_SESSION["authenticated"]);
    unset($_SESSION["auth_user"]);

    $_SESSION["status"] = "logout successfully";
    header("Location: login.php");

?>