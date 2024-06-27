<!DOCTYPE html>
<html>
<body>
    <?php
        class Animal{
            public $name;
            public $color;

            function __construct($name, $color)
            {
                $this->name = $name;
                $this->color = $color;
            }       
            
            function getName() {
                return $this->name;
            }

            function getColor() {
                return $this->color;
            }
        }

        $pig = new Animal("piggy", "pink");

        echo $pig->getName();
        echo "<br>";
        echo $pig->getColor();
    ?>

    
</body>
</html>
