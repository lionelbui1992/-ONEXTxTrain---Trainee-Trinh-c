<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/AccountModel.php";
    

    $account = new AccountModel();

    if(isset($_POST["btn-login"])) handleLogin($conn, $account);
    if(isset($_POST["btn-register"])) handleRegister($conn, $account);

    if(isset($_GET["token"])) handleVerify($conn, $account);


    function handleLogin($conn, $account) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $result_login = $account->login($email, $password, $conn);          
            if($result_login) header("Location: ../view/dashboard.php");
            else header("Location: ../view/login.php");
            exit(0);
    }

    function handleRegister($conn, $account) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $verify_token = md5(rand());
        $result_register = $account->register($email, $password, $conn, $verify_token); 
        if($result_register) {
            $account->sendmail("$email", "$verify_token");
            header("Location: ../view/register.php");
        }
        else header("Location: ../view/register.php");
        exit(0);
    }

    function handleVerify($conn, $account) {
        $token = $_GET["token"];
        $result_verify = $account->verifyEmail($token, $conn);
        if($result_verify) header("Location: ../view/login.php");
        else header("Location: ../view/login.php");
        exit(0);
    }
?>