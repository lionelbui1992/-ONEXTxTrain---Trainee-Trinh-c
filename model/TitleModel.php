<?php
    class TitleModel {
        public function getDataTitle($conn) {
            $sql = "SELECT * FROM title";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_title"] = $result_getdata;
            }
        }

        public function mEditTitle($id, $conn) {
            $sql_edit = "SELECT * FROM title WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditTitle($id, $conn, $title1, $title2, $title3, $title4, $title5, $title6) {
            $sql_edit_save = "UPDATE title SET title1 = '$title1', title2 = '$title2', title3 = '$title3', title4 = '$title4', title5 = '$title5', title6 = '$title6' WHERE id = '$id' LIMIT 1";
            if(mysqli_query($conn, $sql_edit_save)) {
                $_SESSION["status"] = "Cập nhật thành công";
                return true;
            } else {
                $_SESSION["status"] = "Cập nhật thất bại";
                return false;
            }
        }
    }
?>