<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/AccountModel.php";
    

    $account = new AccountModel();

    if(isset($_POST["btn-login"])) handleLogin($conn, $account);
    if(isset($_POST["btn-register"])) handleRegister($conn, $account);

    if(isset($_GET["token"])) handleVerify($conn, $account);

    if(isset($_POST["btn-reset-password"])) resetPassword($conn, $account);

    if(isset($_POST["btn-password-update"])) updatePassword($conn, $account);

    if(isset($_GET["deleteid"])) deleteUser($conn, $account);

    if(isset($_POST["btn-create-user"])) createUser($conn, $account);

    if(isset($_GET["editid"])) editUser($conn, $account);

    if(isset($_POST["btn-save-edit-user"])) saveEditUser($conn, $account);


    function handleLogin($conn, $account) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
            $result_login = $account->login($email, $password, $conn);          
            if($result_login) header("Location: ../view/dashboard.php");
            else header("Location: ../view/login.php");
            exit(0);
    }

    function handleRegister($conn, $account) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
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


    function resetPassword($conn, $account) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $token = md5(rand());
        $result = $account->mResetPassword($email, $token, $conn);
        if($result) {
            $account->sendPassReset($email, $token);
            header("Location: ../view/forgotpassword.php");
        } else header("Location: ../view/forgotpassword.php");
        exit(0);
    }

    function updatePassword($conn, $account) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $new_password = md5(mysqli_real_escape_string($conn, $_POST["new_password"]));
        $confirm_password = md5(mysqli_real_escape_string($conn, $_POST["confirm_password"]));

        $token = mysqli_real_escape_string($conn, $_POST["password_token"]);

        if(!empty($token)) {
            $result = $account->mUpdatePassWord($email, $new_password, $confirm_password, $token, $conn);
            if($result) header("Location: ../view/login.php");
            exit(0);
        } else {
            $_SESSION["status"] = "Không có token tồn tại";
            header("Location: ../view/forgotpassword.php"); 
            exit(0);    
        }
    }

    function deleteUser($conn, $account) {
        $id = $_GET["deleteid"];
        $result = $account->mDeleteUser($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function createUser($conn, $account) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $verify_status = mysqli_real_escape_string($conn, $_POST['verify_status']);
        $verify_token = md5(rand());
        $result = $account->mCreateUser($email, $password, $verify_status, $verify_token, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editUser($conn, $account) {
        $id = $_GET["editid"];
        $result = $account->mEditUser($id, $conn);
        if($result) {
            $_SESSION["data_edit_user"] = $result;
            header("Location: ../view/user/edituser.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditUser($conn, $account) {
        if($_GET["saveeditid"]) {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $password = md5(mysqli_real_escape_string($conn, $_POST["password"]));
            $verify_status = mysqli_real_escape_string($conn, $_POST["verify_status"]);
            $id = $_GET["saveeditid"];
            $result = $account->mSaveEditUser($id, $email, $password, $verify_status, $conn);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>