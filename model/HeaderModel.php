<?php
    class HeaderModel{
        public function mCreateHeader($image_url, $conn) {
            $sql_insert = "INSERT INTO header (image_url) VALUES ('$image_url')";  
            if(mysqli_query($conn, $sql_insert)) {
                $_SESSION["status"] = "Tạo mới thành công";
                return true;
            } else {
                $_SESSION["status"] = "Tạo mới thất bại";
                return false;
            }
        }

        public function getDataHeader($conn) {
            $sql = "SELECT * FROM header";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_header"] = $result_getdata;
                if(mysqli_num_rows($result_getdata) > 1) $_SESSION["delete_header"] = true;
                else $_SESSION["delete_header"] = false;
            }
        }   

        public function mDeleteHeader($id, $conn) {
            $sql_id_delete = "DELETE FROM header WHERE id = '$id'";
            if(mysqli_query($conn, $sql_id_delete)) {
                $_SESSION["status"] = "Xóa thành công";
                return true;
            } else {
                $_SESSION["status"] = "Xóa thất bại";
                return false;
            }
        }

        public function mEditHeader($id, $conn) {
            $sql_edit = "SELECT * FROM header WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditHeader($file_name, $id, $conn) {
            $sql_edit_save = "UPDATE header SET image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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