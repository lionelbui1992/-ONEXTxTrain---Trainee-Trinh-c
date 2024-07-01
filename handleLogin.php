<?php
    session_start();
    require "dbconnect.php";

    if(isset($_POST['btn_login'])) {
        if(!empty(trim($_POST['email'])) && !empty(trim($_POST['email']))) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
    
            $sql_query_mail = "SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1";
            $result_login = mysqli_query($conn, $sql_query_mail);
            if(mysqli_num_rows($result_login) > 0) {
                $row = mysqli_fetch_array($result_login);
                if($row["verify_status"] == "1") {
                    $_SESSION["authenticated"] = true;
                    $_SESSION["auth_user"] = [
                        'email' => $row["email"],
                        'password' => $row["password"]
                    ];
                    $_SESSION["status"] = "login successfully!!";
                    header("Location: index.php");
                    exit(0);
                } else {
                    $_SESSION["status"] = "verified your email to login!";
                    header("Location: login.php");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "No account exsist";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION["status"] = "All field required";
            header("Location: login.php");
            exit(0);
        }        
    }
?>