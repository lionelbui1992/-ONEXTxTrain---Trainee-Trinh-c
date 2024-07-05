<?php 
    class ContentModel {
        public function mCreateYDOD($title, $image_url, $conn) {
            $sql_insert = "INSERT INTO yourdreamsourdrive (title, image_url) VALUES ('$title', '$image_url')";  
            if(mysqli_query($conn, $sql_insert)) {
                $_SESSION["status"] = "Tạo mới thành công";
                return true;
            } else {
                $_SESSION["status"] = "Tạo mới thất bại";
                return false;
            }
        }

        public function getDataYDOD($conn) {
            $sql = "SELECT * FROM yourdreamsourdrive";
            $result_getdata = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result_getdata) > 0) {
                $_SESSION["data_ydod"] = $result_getdata;
                if(mysqli_num_rows($result_getdata) >= 3) {
                    $_SESSION["hide_create_ydod"] = true;
                    $_SESSION["delete_ydod"] = true;
                }
                else {
                    $_SESSION["hide_create_ydod"] = false;
                    if(mysqli_num_rows($result_getdata) > 1) $_SESSION["delete_ydod"] = true;
                    else $_SESSION["delete_ydod"] = false;
                }
            }
        }   

        public function deleteYDOD($id, $conn) {
            $sql_id_delete = "DELETE FROM yourdreamsourdrive WHERE id = '$id'";
            if(mysqli_query($conn, $sql_id_delete)) {
                $_SESSION["status"] = "Xóa thành công";
                return true;
            } else {
                $_SESSION["status"] = "Xóa thất bại";
                return false;
            }
        }

        public function editYDOD($id, $conn) {
            $sql_edit = "SELECT * FROM yourdreamsourdrive WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($conn, $sql_edit);
            if(mysqli_num_rows($result) > 0) return mysqli_fetch_assoc($result);
        }

        public function mSaveEditYDOD($title, $file_name, $id, $conn) {
            $sql_edit_save = "UPDATE yourdreamsourdrive SET title = '$title', image_url = '$file_name' WHERE id = '$id' LIMIT 1";
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