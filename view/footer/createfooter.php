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
    <form class="c" action="<?php echo htmlspecialchars('../../controller/FooterController.php'); ?>" method="post" enctype="multipart/form-data">
        Ảnh:
        <input type="file" name="image" required>
        <br>
        Tiêu đề:
        <input type="text" name="title" placeholder="Nhập tiêu đề" required>
        <br>
        Nội dung:
        <input type="text" name="content" placeholder="Nhập nội dung" required>
        <br>
        <input type="submit" name="btn-create-footer" value="Gửi thông tin">
    </form> 
</body>
</html>