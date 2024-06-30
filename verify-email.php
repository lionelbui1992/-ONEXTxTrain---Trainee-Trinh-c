<?php
    session_start();
    require "dbconnect.php";

    if(isset($_GET["token"])) {
        $token = $_GET["token"];
        $verify_token_query = "SELECT verify_token, verify_status FROM user WHERE verify_token = '$token' LIMIT 1";
        $result_token = mysqli_query($conn, $verify_token_query);

        if(mysqli_num_rows($result_token) > 0) {
            $row = mysqli_fetch_array($result_token);
            if($row['verify_status'] == '0') {
                $verify_token = $row['verify_token'];
                $verify_status_query = "UPDATE user SET verify_status = '1' WHERE verify_token = '$verify_token' LIMIT 1";
                if(mysqli_query($conn, $verify_status_query)) {
                    $_SESSION["status"] = "Your account verified successfully";
                    header("Location: login.php");
                    exit(0);
                } else {
                    $_SESSION["status"] = "verification failed";
                    header("Location: login.php");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "your account verified, please login!!";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION["status"] = "this token not exsist";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION["status"] = "not allowed";
        header("Location: login.php");
        exit(0);
    }
?>