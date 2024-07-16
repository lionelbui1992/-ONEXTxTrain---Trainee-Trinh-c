<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    class AccountModel {
        public function getDataUser($conn) {
            $sql = "SELECT * FROM user";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_user"] = $result_getdata;
            }
        }

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

        public function sendPassReset($email, $token) {
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
            $mail->Subject = 'Reset password';
            $email_template = "
                <h5>Chúng tôi nhận được một yêu cầu đặt lại mật khẩu cho tài khoản của bạn</h5>
                <a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/passwordupdate.php?token=$token&email=$email'>Click here</a>        
            ";
    
            $mail->Body = $email_template;
    
            $mail->send();
        }

        public function mResetPassword($email, $token, $conn) {
            $sql_email_query = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $sql_email_query);
            if(mysqli_num_rows($result) > 0) {
                $sql_update_token = "UPDATE user SET verify_token = '$token' LIMIT 1";
                if(mysqli_query($conn, $sql_update_token)) {
                    $_SESSION["status"] = "Chúng tôi đã gửi cho bạn một đường dẫn về mail để đặt lại mật khẩu";
                    return true;
                } else {
                    $_SESSION["status"] = "Có gì đó sai hãy thử lại sau";
                    return false;
                }
            } else {
                $_SESSION["status"] = "Không tồn tại email";
                return false;
            }
        }

        public function mUpdatePassword($email, $new_password, $confirm_password, $token, $conn) {
            $sql_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
            $result_token = mysqli_query($conn, $sql_token);
            if(mysqli_num_rows($result_token) > 0) {
                if($new_password == $confirm_password) {
                    $update_password = "UPDATE user SET password = '$new_password' WHERE verify_token = '$token' LIMIT 1";
                    if(mysqli_query($conn, $update_password)) {
                        $new_token = md5(rand())."ntk";
                        $sql_update_token = "UPDATE user SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1";
                        $result_update_token = mysqli_query($conn, $sql_update_token);
                        $_SESSION["status"] = "Cập nhật mật khẩu mới thành công";
                        return true;
                    } else {
                        $_SESSION["status"] = "Cập nhật mật khẩu mới không thành công vui lòng thử lại";
                        header("Location: ../view/passwordupdate.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION["status"] = "Mật khẩu và nhập lại mật khẩu không khớp";
                    header("Location: ../view/passwordupdate.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION["status"] = "Token không hợp lệ";
                header("Location: ../view/passwordupdate.php?token=$token&email=$email");
                exit(0);
            }
        }

        public function mDeleteUser($id, $conn) {
            $sql_delete = "DELETE FROM user WHERE id = '$id'";
            if(mysqli_query($conn, $sql_delete)) {
                $_SESSION["status"] = "Xóa người dùng thành công";
                return true;
            } else {
                $_SESSION["status"] = "Xóa người dùng thất bại";
                return false;
            }
        }

        public function mCreateUser($email, $password, $verify_status, $verify_token, $conn) {
            $sql_email_check = "SELECT email FROM user WHERE email = '$email' LIMIT 1";
            $result_email = mysqli_query($conn, $sql_email_check);
            if(mysqli_num_rows($result_email) > 0) {
                $_SESSION["status"] = "Email đã tồn tại";
                return false;
            } else {
                if($verify_status == 0 || $verify_status == 1) {
                    $sql_insert = "INSERT INTO user (email, password, verify_token, verify_status) VALUES ('$email', '$password', '$verify_token', '$verify_status')";
                    if(mysqli_query($conn, $sql_insert)) {
                        $_SESSION["status"] = "Tạo mới người dùng thành công";
                        return true;
                    } else {
                        $_SESSION["status"] = "Tạo người dùng thất bại";
                        return false;
                    }
                } else {
                    $_SESSION["status"] = "Verify status nhận giá trị 0 hoặc 1";
                    return false;
                }
            }
        }

        public function mEditUser($id, $conn) {
            $sql_edit = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditUser($id, $email, $password, $verify_status, $conn) {
            $sql_edit_save = "UPDATE user SET email = '$email', password = '$password', verify_status = '$verify_status' WHERE id = '$id' LIMIT 1";
            if(mysqli_query($conn, $sql_edit_save)) {
                $_SESSION["status"] = "Cập nhật thành công";
                return true;
            } else {
                $_SESSION["status"] = "Cập nhật thất bại";
                return false;
            }
        }
    }
?>