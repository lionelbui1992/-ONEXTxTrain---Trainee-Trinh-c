<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/ContentModel.php";

    $content = new ContentModel();

    if(isset($_POST['btn-create-ydod'])) createYDOD($conn, $content);
    if(isset($_GET["deleteid"])) deleteYDOD($conn, $content);
    if(isset($_GET["editid"])) editYDOD($conn, $content);
    if(isset($_POST["btn-save-edit-ydod"])) saveEditYDOD($conn, $content);

    function createYDOD($conn, $content) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../uploads/" . $file_name;
        $result = $content->mCreateYDOD($title, $file_name, $conn);
        move_uploaded_file($tempname, $folder);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function deleteYDOD($conn, $content) {
        $id = $_GET["deleteid"];
        $result = $content->deleteYDOD($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editYDOD($conn, $content) {
        $id = $_GET["editid"];
        $result = $content->editYDOD($id, $conn);
        if($result) {
            $_SESSION["data_edit_ydod"] = $result;
            header("Location: ../view/yourdreamourdrive/edityourdreamourdrive.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditYDOD($conn, $content) {
        if($_GET["saveeditid"]) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $id = $_GET["saveeditid"];
            $currentimg = $_GET["imageurl"];
            // if(empty($file_name)) $file_name = $currentimg;
            // else $file_name = $_FILES["image"]["name"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $content->mSaveEditYDOD($title, $file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>