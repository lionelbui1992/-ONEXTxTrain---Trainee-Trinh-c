<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    class AccountModel {
        public function login($email, $password, $conn) {
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
                    $_SESSION["status"] = "Đăng nhập thành công!!";
                    return true;
                } else {
                    $_SESSION["status"] = "Xác thực email của bạn để đăng nhập!!";
                    return false;
                }
            } else {
                $_SESSION["status"] = "Không tồn tại tài khoản";
                return false;
            }
        }
        
        public function register($email, $password, $conn, $verify_token) {
            $sql_query_mail = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $sql_query_mail);
            if(mysqli_num_rows($result) > 0) {
                $_SESSION["status"] = "Email đã tồn tại";
                return false;
            } else {
                $sql_insert = "INSERT INTO user (email, password, verify_token) VALUES ('$email', '$password', '$verify_token')";
                if(mysqli_query($conn, $sql_insert)) {
                    $_SESSION["status"] = "Đăng kí thành công, vui lòng xác thực email!!!";
                    return true;
                } else {
                    $_SESSION["status"] = "Đăng kí thất bại";
                    return false;
                }
            } 
        }

        public function sendmail($email, $verify_token) {
        
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
                <a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/AccountController.php?token=$verify_token'>Click here</a>        
            ";
    
            $mail->Body = $email_template;
    
            $mail->send();
        }

        public function verifyEmail($token, $conn) {
            $verify_token_query = "SELECT verify_token, verify_status FROM user WHERE verify_token = '$token' LIMIT 1";
            $result_token = mysqli_query($conn, $verify_token_query);
            if(mysqli_num_rows($result_token) > 0) {
                $row = mysqli_fetch_array($result_token);
                if($row['verify_status'] == '0') {
                    $verify_token = $row['verify_token'];
                    $verify_status_query = "UPDATE user SET verify_status = '1' WHERE verify_token = '$verify_token' LIMIT 1";
                    if(mysqli_query($conn, $verify_status_query)) {
                        $_SESSION["status"] = "Tài khoản đã xác thực thành công!";
                        return true;
                    } else {
                        $_SESSION["status"] = "Xác thực thất bại";
                        return false;
                    }
                } else {
                    $_SESSION["status"] = "Tài khoản của bạn đã được xác thực, vui lòng đăng nhập";
                    return true;
                }
            } else {
                $_SESSION["status"] = "Token không tồn tại!";
                return false;
            }
        }
    }
?>