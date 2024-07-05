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
            if(isset($_SESSION["data_edit_bye"])) {
                $editData = $_SESSION["data_edit_bye"];
                $title = $editData["title"];
                $subtitle = $editData["subtitle"];
                $content = $editData["content"];
                $image_url = $editData["image_url"];
                $id = $editData["id"]; 
                echo <<<EOD
                    <form class="c" action="../../controller/BeginYourExperienceController.php?saveeditid=$id" method="post" enctype="multipart/form-data">
                        Tiêu đề:
                        <input type="text" name="title" placeholder="Nhập tiêu đề" value="$title" required>
                        <br>
                        Phụ đề:
                        <input type="text" name="subtitle" placeholder="Nhập phụ đề" value="$subtitle" required>
                        <br>
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
                        <input type="submit" name="btn-save-edit-bye" value="Gửi thông tin">
                    </form>
                    EOD;
            } 
        ?>
</body>
</html>