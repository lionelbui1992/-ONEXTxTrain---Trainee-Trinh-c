<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/TitleModel.php";

    $title = new TitleModel();
    
    if(isset($_GET["editid"])) editTitle($conn, $title);
    if(isset($_POST["btn-save-edit-title"])) saveEditTitle($conn, $title);


    function editTitle($conn, $title) {
        $id = $_GET["editid"];
        $result = $title->mEditTitle($id, $conn);
        if($result) {
            $_SESSION["data_edit_title"] = $result;
            header("Location: ../view/title/edittitle.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditTitle($conn, $title) {
        if($_GET["saveeditid"]) {
            $id = $_GET["saveeditid"];
            $title1 = mysqli_real_escape_string($conn, $_POST["title1"]);
            $title2 = mysqli_real_escape_string($conn, $_POST["title2"]);
            $title3 = mysqli_real_escape_string($conn, $_POST["title3"]);
            $title4 = mysqli_real_escape_string($conn, $_POST["title4"]);
            $title5 = mysqli_real_escape_string($conn, $_POST["title5"]);
            $title6 = mysqli_real_escape_string($conn, $_POST["title6"]);
            $result = $title->mSaveEditTitle($id, $conn, $title1, $title2, $title3, $title4, $title5, $title6);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>