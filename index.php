<!DOCTYPE html>
<html>
<body>
    <?php
        class Profile{
            public static $name = "Duoc";

            public function getName() {
                return self::$name;
            }
        }

        echo Profile::$name;
        $profile = new Profile();
        echo $profile->getName();
    ?>
</body>
</html>
