<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/HeaderModel.php";

    $headerModel = new HeaderModel();

    if(isset($_POST['btn-create-header'])) createHeader($conn, $headerModel);
    if(isset($_GET["deleteid"])) deleteHeader($conn, $headerModel);
    if(isset($_GET["editid"])) editHeader($conn, $headerModel);
    if(isset($_POST["btn-save-edit-header"])) saveEditHeader($conn, $headerModel);

    function createHeader($conn, $headerModel) {
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../uploads/" . $file_name;
        $result = $headerModel->mCreateHeader($file_name, $conn);
        move_uploaded_file($tempname, $folder);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function deleteHeader($conn, $headerModel) {
        $id = $_GET["deleteid"];
        $result = $headerModel->mDeleteHeader($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editHeader($conn, $headerModel) {
        $id = $_GET["editid"];
        $result = $headerModel->mEditHeader($id, $conn);
        if($result) {
            $_SESSION["data_edit_header"] = $result;
            header("Location: ../view/header/editheader.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditHeader($conn, $headerModel) {
        if($_GET["saveeditid"]) {
            $id = $_GET["saveeditid"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $headerModel->mSaveEditHeader($file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>