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
            if(isset($_SESSION["data_edit_bg2"])) {
                $editData = $_SESSION["data_edit_bg2"];
                $image_url = $editData["image_url"];
                $id = $editData["id"]; 
                $content = $editData["content"];
                echo <<<EOD
                    <form class="c" action="../../controller/Background2Controller.php?saveeditid=$id" method="post" enctype="multipart/form-data">
                        Nội dung:
                            <input type="text" name="content" placeholder="Nhập nội dung" value="$content" required>
                        <br>
                        Ảnh hiện tại:
                        <div>
                            <img class="img-upload" src="../../uploads/$image_url">
                        </div>
                        <div>
                            Thay đổi ảnh mới:
                            <input type="file" name="image" required>
                        </div>
                        <br>
                        <input type="submit" name="btn-save-edit-bg2" value="Gửi thông tin">
                    </form>
                    EOD;
            } 
        ?>
</body>
</html>