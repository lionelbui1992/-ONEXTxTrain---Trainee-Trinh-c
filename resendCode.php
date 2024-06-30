<?php 
    session_start();
    require "dbconnect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function resendEmail($email, $verify_token) {
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
        $mail->Subject = 'RESEND Email verification';
        $email_template = "
            <h5>verify your email address to login</h5>
            <a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/verify-email.php?token=$verify_token'>Click here</a>        
        ";

        $mail->Body = $email_template;

        $mail->send();
    }

    if(isset($_POST["btn-resend"])) {
        if(!empty($_POST["email"])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $sql_resend_query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
            $result_resend = mysqli_query($conn, $sql_resend_query);
            if(mysqli_num_rows($result_resend) > 0) {
                $row = mysqli_fetch_array($result_resend); 
                if($row["verify_status"] == "0") {
                    $email = $row["email"];
                    $verify_token = $row["verify_token"];
                    resendEmail($email, $verify_token);
                    $_SESSION["status"] = "verification code is send to your email, please verify then login";
                    header("Location: login.php");
                    exit(0);
                } else {
                    $_SESSION["status"] = "email is verified, pls login";
                    header("Location: login.php");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "email is not register";
                header("Location: register.php");
                exit(0);
            }
        } else {
            $_SESSION["status"] = "Email is required";
            header("Location: resendEmail.php");
            exit(0);
        }
    }
?>