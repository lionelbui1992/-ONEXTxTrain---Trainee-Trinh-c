<?php
    session_start();
    require "dbconnect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';


    function sendmail($email, $password, $verify_token) {
        
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
        $mail->Subject = 'Email verification';
        $email_template = "
            <h5>verify your email address to login</h5>
            <a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/verify-email.php?token=$verify_token'>Click here</a>        
        ";

        $mail->Body = $email_template;

        $mail->send();

    }

    if(isset($_POST["btn_register"])) {
        if(!empty(trim($_POST["email"])) && !empty(trim($_POST["password"]))) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $verify_token = md5(rand());

            $sql_query_mail = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $sql_query_mail);
            if(mysqli_num_rows($result) > 0) {
                $_SESSION["status"] = "Email has already exsists";
                header("Location: register.php");
            } else {
                $sql_insert = "INSERT INTO user (email, password, verify_token) VALUES ('$email', '$password', '$verify_token')";
                if(mysqli_query($conn, $sql_insert)) {
                    sendmail("$email", "$password", "$verify_token");
                    $_SESSION["status"] = "Register successfully, please verify your email address";
                } else {
                    $_SESSION["status"] = "Register failed";
                }
                header("Location: register.php");   
            }
        } else {
            $_SESSION["status"] = "All field required";
            header("Location: register.php");
            exit(0);
        }     
    }
?>