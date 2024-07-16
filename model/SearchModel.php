<?php 
    class SearchModel{
        public function dataSearch($keyword, $conn) {
            $sql = "SELECT table_name
            FROM information_schema.tables
            WHERE table_type = 'BASE TABLE'
            AND table_schema = 'pe_db'
            AND table_name LIKE '%$keyword%'";
            $result = mysqli_query($conn, $sql);
            $tables = array();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $tables[] = $row['table_name'];
                }
            }
            return $tables;
        }

        public function dataFromTable($tableName, $conn) {
            $sql_data = "SELECT * FROM $tableName";
            $result_data = mysqli_query($conn, $sql_data);
            $data = array();
            if(mysqli_num_rows($result_data) > 0) {
                while ($row = mysqli_fetch_assoc($result_data)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
    }
?>