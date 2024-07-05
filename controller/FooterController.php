<?php 
    session_start();

    require "../include/connectdb.php";
    require "../model/FooterModel.php";

    $footerModel = new FooterModel();

    if(isset($_POST['btn-create-footer'])) createFooter($conn, $footerModel);
    if(isset($_GET["deleteid"])) deleteFooter($conn, $footerModel);
    if(isset($_GET["editid"])) editFooter($conn, $footerModel);
    if(isset($_POST["btn-save-edit-footer"])) saveEditFooter($conn, $footerModel);

    function createFooter($conn, $footerModel) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $content = mysqli_real_escape_string($conn, $_POST["content"]);
        $file_name = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../uploads/" . $file_name;
        $result = $footerModel->mCreateFooter($title, $content, $file_name, $conn);
        move_uploaded_file($tempname, $folder);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function deleteFooter($conn, $footerModel) {
        $id = $_GET["deleteid"];
        $result = $footerModel->mDeleteFooter($id, $conn);
        if($result) header("Location: ../view/dashboard.php");
        else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function editFooter($conn, $footerModel) {
        $id = $_GET["editid"];
        $result = $footerModel->mEditFooter($id, $conn);
        if($result) {
            $_SESSION["data_edit_footer"] = $result;
            header("Location: ../view/footer/editfooter.php?editid=$id");
        } else header("Location: ../view/dashboard.php");
        exit(0);
    }

    function saveEditFooter($conn, $footerModel) {
        if($_GET["saveeditid"]) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $content = mysqli_real_escape_string($conn, $_POST["content"]);
            $id = $_GET["saveeditid"];
            $file_name = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../uploads/" . $file_name;
            $result = $footerModel->mSaveEditFooter($title, $content, $file_name, $id, $conn);
            move_uploaded_file($tempname, $folder);
            if($result) header("Location: ../view/dashboard.php");
            else header("Location: ../view/dashboard.php");
            exit(0);
        }
    }
?>