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
            if(isset($_SESSION["data_edit_config"])) {
                $editData = $_SESSION["data_edit_config"];
                $title = $editData["title"];
                $description = $editData["description"];
                $keyword = $editData["keyword"];
                $id = $editData["id"]; 
                echo <<<EOD
                    <form class="c" action="../../controller/ConfigController.php?saveeditid=$id" method="post" enctype="multipart/form-data">
                        Tiêu đề:
                        <input type="text" name="title" placeholder="Nhập tiêu đề" value="$title" required>
                        <br>
                        Mô tả:
                        <input type="text" name="description" placeholder="Nhập phụ đề" value="$description" required>
                        <br>
                        Từ khóa:
                        <input type="text" name="keyword" placeholder="Nhập nội dung" value="$keyword" required>
                        <br>
                        <input type="submit" name="btn-save-edit-config" value="Gửi thông tin">
                    </form>
                    EOD;
            } 
        ?>
</body>
</html>