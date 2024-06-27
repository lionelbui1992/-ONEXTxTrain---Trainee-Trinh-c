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
            
            function __destruct()
            {
                echo "the pet is {$this->name} and the color is {$this->color}";
            }
        }

        $pig = new Animal("piggy", "pink");
    ?>

    
</body>
</html>
