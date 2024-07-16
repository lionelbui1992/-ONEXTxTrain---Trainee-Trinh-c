<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .c{
            text-align: center;
        }
    </style>
</head>
<body>
    <form class="c" action="<?php echo htmlspecialchars('../../controller/AccountController.php'); ?>" method="post">
        Email:
        <input type="text" name="email" placeholder="Nhập email" required>
        <br>
        Password:
        <input type="text" name="password" placeholder="Nhập mật khẩu" required>
        <br>
        Verify status:
        <input type="text" name="verify_status" placeholder="Nhập trạng thái xác thực" required>
        <br>
        <input type="submit" name="btn-create-user" value="Gửi thông tin">
    </form> 
</body>
</html>