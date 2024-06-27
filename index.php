<!DOCTYPE html>
<html>
<body>
    <?php
        $email = "trinhduoc@gmail.com";
        
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) echo "email valid";
        else echo "email not valid";


        //advanced
        $int = 101;
        if(filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 100)))) echo "số nguyên trong khoảng 0 đến 100";
        else echo "không là số nguyên trong khoảng 0 đén 100";
    ?>
</body>
</html>
