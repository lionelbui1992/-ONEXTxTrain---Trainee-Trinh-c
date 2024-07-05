<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/Background1Model.php";

    $background1 = new Background1();
    
    if(isset($_GET["editid"])) editBg($conn, $background1);
    if(isset($_POST["btn-save-edit-bg"])) saveEditBg($conn, $background1);


    function editBg($conn, $background1) {
        $id = $_GET["editid"];
        $result = $background1->mEditBg($id, $conn);
        if($result) {
            $_SESSION["data_edit_bg1"] = $result;
            header("Location: ../view/background1/editbackground1.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditBg($conn, $background1) {
        if($_GET["saveeditid"]) {
            $id = $_GET["saveeditid"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $background1->mSaveEditBg($file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>