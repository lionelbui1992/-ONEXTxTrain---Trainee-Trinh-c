<!DOCTYPE html>
<html>
<body>
    <?php
        $json_string = 
        '{
            "name" : "Duoc",
            "age" : "24",
            "location" : "VietTri"
        }';

        var_dump(json_decode($json_string, true)); //arr
        echo "<br>";
        var_dump(json_decode($json_string)); //obj

        $age = array("Duoc" => 24, "nam" => 12, "linh" => 30);

        echo json_encode($age);
    ?>
</body>
</html>
