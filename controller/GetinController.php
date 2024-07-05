<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/GetinModel.php";

    $getinModel = new GetinModel();

    if(isset($_POST['btn-create-getin'])) createGetin($conn, $getinModel);
    if(isset($_GET["deleteid"])) deleteGetin($conn, $getinModel);
    if(isset($_GET["editid"])) editGetin($conn, $getinModel);
    if(isset($_POST["btn-save-edit-getin"])) saveEditGetin($conn, $getinModel);

    function createGetin($conn, $getinModel) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $subtitle = mysqli_real_escape_string($conn, $_POST["subtitle"]);
        $content = mysqli_real_escape_string($conn, $_POST["content"]);
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../uploads/" . $file_name;
        $result = $getinModel->mCreateGetin($title, $subtitle, $content, $file_name, $conn);
        move_uploaded_file($tempname, $folder);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function deleteGetin($conn, $getinModel) {
        $id = $_GET["deleteid"];
        $result = $getinModel->mDeleteGetin($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editGetin($conn, $getinModel) {
        $id = $_GET["editid"];
        $result = $getinModel->mEditGetin($id, $conn);
        if($result) {
            $_SESSION["data_edit_getin"] = $result;
            header("Location: ../view/getin/editgetin.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditGetin($conn, $getinModel) {
        if($_GET["saveeditid"]) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $subtitle = mysqli_real_escape_string($conn, $_POST["subtitle"]);
            $content = mysqli_real_escape_string($conn, $_POST["content"]);
            $id = $_GET["saveeditid"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $getinModel->mSaveEditGetin($title, $subtitle, $content, $file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>