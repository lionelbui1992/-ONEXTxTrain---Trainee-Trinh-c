<!DOCTYPE html>
<html>
<body>
    <?php
        $arr = [1,2,3];

        function iterable(iterable $iter) {
            foreach($iter as $item) {
                echo $item;
            }
        }

        iterable($arr);
    ?>
</body>
</html>
