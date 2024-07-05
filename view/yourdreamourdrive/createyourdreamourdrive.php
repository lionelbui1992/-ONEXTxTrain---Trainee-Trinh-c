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
    <form class="c" action="<?php echo htmlspecialchars('../../controller/ContentController.php'); ?>" method="post" enctype="multipart/form-data">
        Tiêu đề:
        <input type="text" name="title" placeholder="Nhập tiêu đề" required>
        <br>
        Ảnh:
        <input type="file" name="image" required>
        <br>
        <input type="submit" name="btn-create-ydod" value="Gửi thông tin">
    </form> 
</body>
</html>