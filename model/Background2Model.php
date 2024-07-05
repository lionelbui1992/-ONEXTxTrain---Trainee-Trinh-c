<?php 
    class Background2 {
        public function getDataBg2($conn) {
            $sql = "SELECT * FROM background2";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_bg2"] = $result_getdata;
            }
        }

        public function mEditBg2($id, $conn) {
            $sql_edit = "SELECT * FROM background2 WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditBg2($content, $file_name, $id, $conn) {
            $sql_edit_save = "UPDATE background2 SET content = '$content', image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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