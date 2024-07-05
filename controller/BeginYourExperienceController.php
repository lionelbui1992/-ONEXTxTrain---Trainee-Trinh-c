<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/BeginYourExperienceModel.php";

    $byeModel = new BeginYourExperienceModel();

    if(isset($_POST['btn-create-bye'])) createBye($conn, $byeModel);
    if(isset($_GET["deleteid"])) deleteBye($conn, $byeModel);
    if(isset($_GET["editid"])) editBye($conn, $byeModel);
    if(isset($_POST["btn-save-edit-bye"])) saveEditBye($conn, $byeModel);

    function createBye($conn, $byeModel) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $subtitle = mysqli_real_escape_string($conn, $_POST["subtitle"]);
        $content = mysqli_real_escape_string($conn, $_POST["content"]);
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../uploads/" . $file_name;
        $result = $byeModel->mCreateBye($title, $subtitle, $content, $file_name, $conn);
        move_uploaded_file($tempname, $folder);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function deleteBye($conn, $byeModel) {
        $id = $_GET["deleteid"];
        $result = $byeModel->mDeleteBye($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editBye($conn, $byeModel) {
        $id = $_GET["editid"];
        $result = $byeModel->mEditBye($id, $conn);
        if($result) {
            $_SESSION["data_edit_bye"] = $result;
            header("Location: ../view/beginyourexperience/editbeginyourexperience.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditBye($conn, $byeModel) {
        if($_GET["saveeditid"]) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $subtitle = mysqli_real_escape_string($conn, $_POST["subtitle"]);
            $content = mysqli_real_escape_string($conn, $_POST["content"]);
            $id = $_GET["saveeditid"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $byeModel->mSaveEditBye($title, $subtitle, $content, $file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>