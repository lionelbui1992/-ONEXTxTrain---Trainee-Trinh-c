<?php 
    session_start();
    unset($_SESSION["authenticated"]);
    unset($_SESSION["auth_user"]);

    $_SESSION["status"] = "Đăng xuất thành công!!";
    header("Location: ../view/login.php");
?>