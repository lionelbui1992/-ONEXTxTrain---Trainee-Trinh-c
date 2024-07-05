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
    <form class="c" action="<?php echo htmlspecialchars('../../controller/BeginYourExperienceController.php'); ?>" method="post" enctype="multipart/form-data">
        Tiêu đề:
        <input type="text" name="title" placeholder="Nhập tiêu đề" required>
        <br>
        Phụ đề:
        <input type="text" name="subtitle" placeholder="Nhập phụ đề" required>
        <br>
        Nội dung:
        <input type="text" name="content" placeholder="Nhập nội dung" required>
        <br>
        Ảnh:
        <input type="file" name="image" required>
        <br>
        <input type="submit" name="btn-create-bye" value="Gửi thông tin">
    </form> 
</body>
</html>