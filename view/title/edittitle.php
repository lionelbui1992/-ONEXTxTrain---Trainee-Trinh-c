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
            if(isset($_SESSION["data_edit_title"])) {
                $editData = $_SESSION["data_edit_title"];
                $id = $editData["id"]; 
                $title1 = $editData["title1"];
                $title2 = $editData["title2"];
                $title3 = $editData["title3"];
                $title4 = $editData["title4"];
                $title5 = $editData["title5"];
                $title6 = $editData["title6"];
                echo <<<EOD
                    <form class="c" action="../../controller/TitleController.php?saveeditid=$id" method="post" enctype="multipart/form-data">
                        Tiêu đề 1:
                            <input type="text" name="title1" placeholder="Nhập nội dung" value="$title1" required>
                        <br>
                        Tiêu đề 2:
                            <input type="text" name="title2" placeholder="Nhập nội dung" value="$title2" required>
                        <br>
                        Tiêu đề 3:
                            <input type="text" name="title3" placeholder="Nhập nội dung" value="$title3" required>
                        <br>
                        Tiêu đề 4:
                            <input type="text" name="title4" placeholder="Nhập nội dung" value="$title4" required>
                        <br>
                        Tiêu đề 5:
                            <input type="text" name="title5" placeholder="Nhập nội dung" value="$title5" required>
                        <br>
                        Tiêu đề 6:
                            <input type="text" name="title6" placeholder="Nhập nội dung" value="$title6" required>
                        <br>
                        <input type="submit" name="btn-save-edit-title" value="Gửi thông tin">
                    </form>
                    EOD;
            } 
        ?>
</body>
</html>