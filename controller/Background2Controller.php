<?php
    session_start();

    require "../include/connectdb.php";
    require "../model/Background2Model.php";

    $background2 = new Background2();
    
    if(isset($_GET["editid"])) editBg2($conn, $background2);
    if(isset($_POST["btn-save-edit-bg2"])) saveEditBg2($conn, $background2);


    function editBg2($conn, $background2) {
        $id = $_GET["editid"];
        $result = $background2->mEditBg2($id, $conn);
        if($result) {
            $_SESSION["data_edit_bg2"] = $result;
            header("Location: ../view/background2/editbackground2.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditBg2($conn, $background2) {
        if($_GET["saveeditid"]) {
            $id = $_GET["saveeditid"];
            $content = mysqli_real_escape_string($conn, $_POST["content"]);
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $background2->mSaveEditBg2($content, $file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>