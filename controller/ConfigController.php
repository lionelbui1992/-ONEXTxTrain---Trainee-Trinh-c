<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/ConfigModel.php";

    $configModel = new ConfigModel();

    if(isset($_GET["editid"])) editConfig($conn, $configModel);
    if(isset($_POST["btn-save-edit-config"])) saveEditConfig($conn, $configModel);

    function editConfig($conn, $configModel) {
        $id = $_GET["editid"];
        $result = $configModel->mEditConfig($id, $conn);
        if($result) {
            $_SESSION["data_edit_config"] = $result;
            header("Location: ../view/config/editconfig.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditConfig($conn, $configModel) {
        if($_GET["saveeditid"]) {
            $id = $_GET["saveeditid"];
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
            $keyword = mysqli_real_escape_string($conn, $_POST["keyword"]);
            $result = $configModel->mSaveEditConfig($title, $description, $keyword, $id, $conn);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/header.php");
            exit(0);
        }
    }
?>