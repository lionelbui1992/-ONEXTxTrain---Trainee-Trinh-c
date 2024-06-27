<?php
    include "namespace.php";
    
    $animal = new NS\Animal();
    $animal->name = "pig"
?>
<!DOCTYPE html>
<html>
<body>
    <?php echo $animal->pet(); ?>
</body>
</html>
