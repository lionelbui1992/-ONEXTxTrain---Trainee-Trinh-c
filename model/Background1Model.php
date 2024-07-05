<?php
    class Background1 {
        public function getDataBg($conn) {
            $sql = "SELECT * FROM background1";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_bg1"] = $result_getdata;
            }
        }

        public function mEditBg($id, $conn) {
            $sql_edit = "SELECT * FROM background1 WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditBg($file_name, $id, $conn) {
            $sql_edit_save = "UPDATE background1 SET image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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