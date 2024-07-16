<?php 
    // session_start();

    require "../include/connectdb.php";
    require "../model/SearchModel.php";

    $searchModel = new SearchModel();

    if(isset($_POST["btn-search"])) search($conn, $searchModel);

    function search($conn, $searchModel) {
        $keyword = mysqli_real_escape_string($conn, $_POST["keyword"]);
        $keyword = strtolower($keyword);
        if(!empty($keyword)) {
            $result = $searchModel->dataSearch($keyword, $conn);
            for($i = 0; $i < count($result); $i ++) {
                $data[] = $searchModel->dataFromTable($result[$i], $conn);
            }
        }
        require "../view/dashboard.php";
    }
?>