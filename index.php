<!DOCTYPE html>
<html>
<body>
    <?php
        class Profile{
            const MY_NAME = "Trinh Duoc";
            public function getName() {
                echo self::MY_NAME;
            }
        }  

        $profile = new Profile();
        $profile->getName();
    ?>
</body>
</html>
