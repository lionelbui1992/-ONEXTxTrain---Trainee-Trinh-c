<?php 
    session_start();
    require "dbconnect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function sendPassReset($email, $token) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                               
        $mail->Username   = 'trinhduoc69@gmail.com';                    
        $mail->Password   = 'egab opjr dhxb ivih';                            
        $mail->SMTPSecure = 'tls';         
        $mail->Port       = 587;                               

        //Recipients
        $mail->setFrom('trinhduoc69@gmail.com');
        $mail->addAddress($email);   

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'reset password verification';
        $email_template = "
            <h5>we received a request reset password for your account</h5>
            <a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/passwordChange.php?token=$token&email=$email'>Click here</a>        
        ";

        $mail->Body = $email_template;

        $mail->send();
    }

    if(isset($_POST["password-reset-btn"])) {
        if(!empty(trim($_POST["email"]))) {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $token = md5(rand());

            $sql_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
            $result_email = mysqli_query($conn, $sql_email_query);
            if(mysqli_num_rows($result_email) > 0) {
                $row = mysqli_fetch_array($result_email);
                $rowEmail = $_POST["email"];

                $sql_update_token = "UPDATE user SET verify_token = '$token' LIMIT 1";
                
                if(mysqli_query($conn, $sql_update_token)) {
                    sendPassReset($email, $token);
                    $_SESSION["status"] = "we mailed you a password reset link";
                    header("Location: passwordReset.php");
                    exit(0);
                } else {
                    $_SESSION["status"] = "st wrong try again later";
                    header("Location: passwordReset.php");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "No email found!!!";
                header("Location: passwordReset.php");
                exit(0);
            }
        } else {
            $_SESSION["status"] = "email is required";
            header("Location: passwordReset.php");
            exit(0);
        }
    }

    if(isset($_POST["password_update"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $new_password = mysqli_real_escape_string($conn, $_POST["new_password"]);
        $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);
        
        $token = mysqli_real_escape_string($conn, $_POST["password_token"]);
        
        if(!empty($token)) {
            if(!empty($email) && !empty($new_password) && !empty($confirm_password)) {
                //
                $sql_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
                $result_token = mysqli_query($conn, $sql_token);
                if(mysqli_num_rows($result_token) > 0) {
                    if($new_password == $confirm_password) {
                        $update_password = "UPDATE user SET password = '$new_password' WHERE verify_token = '$token' LIMIT 1";
                        if(mysqli_query($conn, $update_password)) {
                            $new_token = md5(rand())."ntk";
                            $sql_update_token = "UPDATE user SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1";
                            $result_update_token = mysqli_query($conn, $sql_update_token);
                            $_SESSION["status"] = "update password successfully!!!";
                            header("Location: login.php");
                            exit(0);
                        } else {
                            $_SESSION["status"] = "update password failed pls try again";
                            header("Location: passwordChange.php?token=$token&email=$email");
                            exit(0);
                        }
                    } else {
                        $_SESSION["status"] = "password and confirm password does not match";
                        header("Location: passwordChange.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION["status"] = "invalid token";
                    header("Location: passwordChange.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "all field is required";
                header("Location: passwordChange.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION["status"] = "no token available";
            header("Location: passwordReset.php");
            exit(0);
        }
    } 
?>
