<?php 
    class GetinModel{
        public function mCreateGetin($title, $subtitle, $content, $image_url, $conn) {
            $sql_insert = "INSERT INTO getin (title, subtitle, content, image_url) VALUES ('$title', '$subtitle', '$content', '$image_url')";  
            if(mysqli_query($conn, $sql_insert)) {
                $_SESSION["status"] = "Tạo mới thành công";
                return true;
            } else {
                $_SESSION["status"] = "Tạo mới thất bại";
                return false;
            }
        }

        public function getDataGetin($conn) {
            $sql = "SELECT * FROM getin";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_getin"] = $result_getdata;
                if(mysqli_num_rows($result_getdata) > 3) $_SESSION["delete_getin"] = true;
                else $_SESSION["delete_getin"] = false;
            }
        }   

        public function mDeleteGetin($id, $conn) {
            $sql_id_delete = "DELETE FROM getin WHERE id = '$id'";
            if(mysqli_query($conn, $sql_id_delete)) {
                $_SESSION["status"] = "Xóa thành công";
                return true;
            } else {
                $_SESSION["status"] = "Xóa thất bại";
                return false;
            }
        }

        public function mEditGetin($id, $conn) {
            $sql_edit = "SELECT * FROM getin WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditGetin($title, $subtitle, $content, $file_name, $id, $conn) {
            $sql_edit_save = "UPDATE getin SET title = '$title', subtitle = '$subtitle', content = '$content', image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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