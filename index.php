<!DOCTYPE html>
<html>
<body>
<?php

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo "The date/time is " . date('d-m-Y H:i:s');

    $date = new DateTime('27-06-2024');
    $date->modify('+1 day');
    echo $date->format('d-m-Y');


    $date1 = new DateTime('28-06-2024');
    $date2 = new DateTime('01-07-2024');
    $diff = $date1->diff($date2);
    echo $diff->days;
?>
</body>
</html>
