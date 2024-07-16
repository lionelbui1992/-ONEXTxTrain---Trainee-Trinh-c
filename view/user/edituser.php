<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .img-upload {
        width: 200px;
        height: 200px;
    }

    .c{
        text-align: center;
    }
</style>
</head>
<body>
        <?php 
            if(isset($_SESSION["data_edit_user"])) {
                $editData = $_SESSION["data_edit_user"];
                $email = $editData["email"];
                $password = $editData["password"];
                $verify_status = $editData["verify_status"];
                $id = $editData["id"]; 
                echo <<<EOD
                    <form class="c" action="../../controller/AccountController.php?saveeditid=$id" method="post">
                        Email:
                        <input type="text" name="email" placeholder="Nhập email" value="$email" required>
                        <br>
                        Password:
                        <input type="text" name="password" placeholder="Nhập mật khẩu" value="$password" required>
                        <br>
                        Verify status:
                        <input type="text" name="verify_status" placeholder="Nhập trạng thái" value="$verify_status" required>
                        <br>
                        <input type="submit" name="btn-save-edit-user" value="Gửi thông tin">
                    </form>
                    EOD;
            } 
        ?>
</body>
</html>