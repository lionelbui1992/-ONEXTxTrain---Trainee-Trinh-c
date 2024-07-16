<?php 
    class ConfigModel {
        public function getDataConfig($conn) {
            $sql = "SELECT * FROM configoption";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_config"] = $result_getdata;
            }
        }

        public function mEditConfig($id, $conn) {
            $sql_edit = "SELECT * FROM configoption WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditConfig($title, $description, $keyword, $id, $conn) {
            $sql_edit_save = "UPDATE configoption SET title = '$title', description = '$description', keyword = '$keyword' WHERE id = '$id' LIMIT 1";
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