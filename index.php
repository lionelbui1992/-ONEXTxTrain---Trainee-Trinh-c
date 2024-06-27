<!DOCTYPE html>
<html>
<body>
    <?php
        interface Animal{
            public function makeSound();
        }

        class Pig implements Animal{
            public function makeSound()
            {
                echo "ec ec";
            }
        }

        $pig = new Pig();
        $pig->makeSound();
    ?>
</body>
</html>
