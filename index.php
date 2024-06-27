<!DOCTYPE html>
<html>
<body>
    <?php
        $fileTxt = fopen("file.txt", "w");
        $txt = "Duoc\n";
        fwrite($fileTxt, $txt);
        $txt = "Nam\n";
        fwrite($fileTxt, $txt);
        fclose($fileTxt);
    ?>
</body>
</html>
