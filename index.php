<!DOCTYPE html>
<html>
<body>
    <?php
        $fileTxt = fopen("file.txt", "w");
        //echo fread($fileTxt, filesize("file.txt"));
        fclose($fileTxt);
    ?>
</body>
</html>
