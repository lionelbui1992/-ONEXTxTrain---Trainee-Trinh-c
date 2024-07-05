<?php 
    class BeginYourExperienceModel{
        public function mCreateBye($title, $subtitle, $content, $image_url, $conn) {
            $sql_insert = "INSERT INTO beginyourexperience (title, subtitle, content, image_url) VALUES ('$title', '$subtitle', '$content', '$image_url')";  
            if(mysqli_query($conn, $sql_insert)) {
                $_SESSION["status"] = "Tạo mới thành công";
                return true;
            } else {
                $_SESSION["status"] = "Tạo mới thất bại";
                return false;
            }
        }

        public function getDataBye($conn) {
            $sql = "SELECT * FROM beginyourexperience";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_bye"] = $result_getdata;
                if(mysqli_num_rows($result_getdata) > 3) $_SESSION["delete_bye"] = true;
                else $_SESSION["delete_bye"] = false;
            }
        }   

        public function mDeleteBye($id, $conn) {
            $sql_id_delete = "DELETE FROM beginyourexperience WHERE id = '$id'";
            if(mysqli_query($conn, $sql_id_delete)) {
                $_SESSION["status"] = "Xóa thành công";
                return true;
            } else {
                $_SESSION["status"] = "Xóa thất bại";
                return false;
            }
        }

        public function mEditBye($id, $conn) {
            $sql_edit = "SELECT * FROM beginyourexperience WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditBye($title, $subtitle, $content, $file_name, $id, $conn) {
            $sql_edit_save = "UPDATE beginyourexperience SET title = '$title', subtitle = '$subtitle', content = '$content', image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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