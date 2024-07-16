<?php 
    session_start();

    require "../model/ContentModel.php";
    require "../model/Background1Model.php";
    require "../model/Background2Model.php";
    require "../model/HeaderModel.php";
    require "../model/TitleModel.php";
    require "../model/BeginYourExperienceModel.php";
    require "../model/GetinModel.php";
    require "../model/FooterModel.php";
    require "../include/connectdb.php";
    require "../model/ConfigModel.php";
    require "../model/AccountModel.php";

    if(!isset($_SESSION["authenticated"])) {
        $_SESSION["status"] = "Đăng nhập để truy cập";
        header("Location: login.php");
        exit(0);
    }

    $content = new ContentModel();
    $content->getDataYDOD($conn);

    $bg1 = new Background1();
    $bg1->getDataBg($conn);

    $bg2 = new Background2();
    $bg2->getDataBg2($conn);

    $header = new HeaderModel();
    $header->getDataHeader($conn);

    $title = new TitleModel();
    $title->getDataTitle($conn);

    $byeModel = new BeginYourExperienceModel();
    $byeModel->getDataBye($conn);

    $getinModel = new GetinModel();
    $getinModel->getDataGetin($conn);

    $footerModel = new FooterModel();
    $footerModel->getDataFooter($conn);

    $configModel = new ConfigModel();
    $configModel->getDataConfig($conn);

    $userModel = new AccountModel();
    $userModel->getDataUser($conn);

    $hideCreateClass = $_SESSION["hide_create_ydod"] == true ? 'hide' : 'show';
    $deleteYdod = $_SESSION["delete_ydod"] == true ? 'show' : 'hide';

    $deleteHeader = $_SESSION["delete_header"] == true ? 'show' : 'hide';

    $deleteBye = $_SESSION["delete_bye"] == true ? 'show' : 'hide';
    $deleteGetin = $_SESSION["delete_getin"] == true ? 'show' : 'hide';
    $deleteFooter = $_SESSION["delete_footer"] == true ? 'show' : 'hide';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
<style>
body {
    margin: 0;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

.right {
    float: right;
}

.center {
    text-align: center;
}

.mt-15 {
    margin-top: 15px;
}

.c-table {
    margin: 20px auto;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}


table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

.img-upload {
    width: 200px;
    height: 200px;
}

.hide {
    display: none;
}

.show {
    display: block;
}
.error {
    color: red;
    font-size: 30px;
}
</style>
</style>
</head>
<body>
    <h1 class="center">Welcome <?php echo $_SESSION["auth_user"]["email"]?></h1>
    <div class="right"><a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/logout.php">Logout</a></div>
    <div class="center">
        <?php 
            if(isset($_SESSION["status"])) {
                echo "<div class='error'>" . $_SESSION['status'] . "</div>";
                unset($_SESSION["status"]);
            }
        ?>
    </div>
    <br>    
    <div class="center">
        <form class="c" action="<?php echo htmlspecialchars('../controller/SearchController.php'); ?>" method="post">
            <input type="text" name="keyword" placeholder="Tìm kiếm">
            <input type="submit" name="btn-search" value="Gửi thông tin">
        </form> 
    </div>  
    <div class="center">
        <h3>Search Results</h3> 
        <?php if(!empty($data)): ?>
        <table class="c-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Từ khóa</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Trạng thái xác thực</th>
                    <th>Nội dung</th>
                    <th>Phụ đề</th>
                    <th>Tiêu đề 1</th>
                    <th>Tiêu đề 2</th>
                    <th>Tiêu đề 3</th>
                    <th>Tiêu đề 4</th>
                    <th>Tiêu đề 5</th>
                    <th>Tiêu đề 6</th>
                    <th>Ảnh</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <?php foreach($row as $item): ?>
                        <tr>
                            <td><?php echo isset($item['id']) ? htmlspecialchars($item['id']) : ''; ?></td>
                            <td><?php echo isset($item['title']) ? htmlspecialchars($item['title']) : ''; ?></td>
                            <td><?php echo isset($item['description']) ? htmlspecialchars($item['description']) : ''; ?></td>
                            <td><?php echo isset($item['keyword']) ? htmlspecialchars($item['keyword']) : ''; ?></td>
                            <td><?php echo isset($item['email']) ? htmlspecialchars($item['email']) : ''; ?></td>
                            <td><?php echo isset($item['password']) ? htmlspecialchars($item['password']) : ''; ?></td>
                            <td><?php echo isset($item['verify_status']) ? htmlspecialchars($item['verify_status']) : ''; ?></td>
                            <td><?php echo isset($item['content']) ? htmlspecialchars($item['content']) : ''; ?></td>
                            <td><?php echo isset($item['subtitle']) ? htmlspecialchars($item['subtitle']) : ''; ?></td>
                            <td><?php echo isset($item['title1']) ? htmlspecialchars($item['title1']) : ''; ?></td>
                            <td><?php echo isset($item['title2']) ? htmlspecialchars($item['title2']) : ''; ?></td>
                            <td><?php echo isset($item['title3']) ? htmlspecialchars($item['title3']) : ''; ?></td>
                            <td><?php echo isset($item['title4']) ? htmlspecialchars($item['title4']) : ''; ?></td>
                            <td><?php echo isset($item['title5']) ? htmlspecialchars($item['title5']) : ''; ?></td>
                            <td><?php echo isset($item['title6']) ? htmlspecialchars($item['title6']) : ''; ?></td>
                            <td>
                                <?php if (isset($item['image_url'])): ?>
                                    <img class='img-upload' src='../uploads/<?php echo htmlspecialchars($item['image_url']); ?>'>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>            
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
    <div class="config">
        <h1>1. configoption</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Từ khóa</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_config"])) {
                $data = $_SESSION["data_config"];
                while($row = mysqli_fetch_array($data)) {
                    $title = $row["title"];
                    $description = $row["description"];
                    $keyword = $row["keyword"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>"  . $title . "</td><td>" . $description . "</td><td>" . $keyword . "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/ConfigController.php?editid=$id'>Sửa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
    </div>
    <div class="config">
        <h1>2. user</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Verify status</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_user"])) {
                $data = $_SESSION["data_user"];
                while($row = mysqli_fetch_array($data)) {
                    $email = $row["email"];
                    $password = $row["password"];
                    $verify_status = $row["verify_status"];
                    $id = $row["id"];
                    echo "<tr><td>" . $id . "</td><td>"  . $email . "</td><td>" . $password . "</td><td>" . $verify_status . "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/AccountController.php?editid=$id'>Sửa</a>" . "<br>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/AccountController.php?deleteid=$id'>Xóa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/user/createuser.php">Thêm mới</a>
        </div>
    </div>
    <div class="header">
        <h1>3. header</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_header"])) {
                $data = $_SESSION["data_header"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>"  . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/HeaderController.php?editid=$id'>Sửa</a>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/HeaderController.php?deleteid=$id' class='<?php echo $deleteHeader ?>'>Xóa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/header/createheader.php">Thêm mới</a>
        </div>
    </div>
    <div class="yourdreamourdrive">
        <h1>4. yourdreamsourdrive</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_ydod"])) {
                        $data = $_SESSION["data_ydod"];
                        while($row = mysqli_fetch_array($data)) {
                            $image_url = $row["image_url"];
                            $id = $row["id"];
                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/ContentController.php?editid=$id'>Sửa</a>" . "<br>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/ContentController.php?deleteid=$id' class='<?php echo $deleteYdod ?>'>Xóa</a>" . "</td></tr>";
                        }
                    } 
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/yourdreamourdrive/createyourdreamourdrive.php" class="<?php echo $hideCreateClass; ?>">Thêm mới</a>
        </div>
    </div>
    <div class="background1">
        <h1>5. background1</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_bg1"])) {
                $data = $_SESSION["data_bg1"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>"  . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/Background1Controller.php?editid=$id'>Sửa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>             
    </div>
    <div class="beginyourexperience">
        <h1>6. beginyourexperience</h1>    
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Phụ đề</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_bye"])) {
                $data = $_SESSION["data_bye"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title"] . "</td><td>" . $row["subtitle"] . "</td><td>" . $row["content"] . "</td><td>" . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/BeginYourExperienceController.php?editid=$id'>Sửa</a>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/BeginYourExperienceController.php?deleteid=$id' class='<?php echo $deleteBye ?>'>Xóa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/beginyourexperience/createbeginyourexperience.php">Thêm mới</a>
        </div>             
    </div>

    <div class="getin">
        <h1>7. getin</h1>    
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Phụ đề</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_getin"])) {
                $data = $_SESSION["data_getin"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["subtitle"] . "</td><td>" . $row["title"] . "</td><td>" . $row["content"] . "</td><td>" . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/GetinController.php?editid=$id'>Sửa</a>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/GetinController.php?deleteid=$id' class='<?php echo $deleteGetin ?>'>Xóa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/getin/creategetin.php">Thêm mới</a>
        </div>             
    </div>
    <div class="background2">
        <h1>8. background2</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_bg2"])) {
                $data = $_SESSION["data_bg2"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["content"] . "</td><td>" . "<img class='img-upload' src='../uploads/$image_url'>" .  "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/Background2Controller.php?editid=$id'>Sửa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
    </div>
    <div class="footer">
        <h1>9. footer</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_footer"])) {
                $data = $_SESSION["data_footer"];
                while($row = mysqli_fetch_array($data)) {
                    $image_url = $row["image_url"];
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>" . "<img class='img-upload' src='../uploads/$image_url'>" . "</td><td>" . $row["title"] . "</td><td>" . $row["content"] . "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/FooterController.php?editid=$id'>Sửa</a>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/FooterController.php?deleteid=$id' class='<?php echo $deleteFooter ?>'>Xóa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
        <div class="mt-15 center">
            <a href="http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/view/footer/createfooter.php">Thêm mới</a>
        </div>
    </div>
    <div class="title">
        <h1>10. title</h1>
        <table class="c-table">
            <tr>
                <th>ID</th>
                <th>Tiêu đề 1</th>
                <th>Tiêu đề 2</th>
                <th>Tiêu đề 3</th>
                <th>Tiêu đề 4</th>
                <th>Tiêu đề 5</th>
                <th>Tiêu đề 6</th>
                <th>Hành động</th>
            </tr>
            <?php if(isset($_SESSION["data_title"])) {
                $data = $_SESSION["data_title"];
                while($row = mysqli_fetch_array($data)) {
                    $id = $row["id"];
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["title1"] . "</td><td>" . $row["title2"] .  "</td><td>" . $row["title3"] . "</td><td>" . $row["title4"] . "</td><td>" . $row["title5"] . "</td><td>" . $row["title6"] . "</td><td>" . "<a href='http://localhost:8080/PHPtraining/-ONEXTxTrain---Trainee-Trinh-c/controller/TitleController.php?editid=$id'>Sửa</a>" . "</td></tr>";
                }
            }
            ?>
        </table>
    </div>
</body>
</html>