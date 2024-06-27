<!DOCTYPE html>
<html>
<body>
    <?php
        function checkNum($num) {
            if($num > 1) throw new Exception("Giá trị phải nhỏ hơn hoặc bằng 1."); 
            return true;
        }

        checkNum(2);

    ?>
</body>
</html>
