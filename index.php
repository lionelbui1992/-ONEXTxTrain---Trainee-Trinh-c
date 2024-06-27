<!DOCTYPE html>
<html>
<body>
    <?php
        class Animal{
            public $name;
            public $color;

            public function __construct($name, $color) 
            {
                $this->name = $name;
                $this->color = $color;
            }
            
            // protected function intro() {
            //     echo "the pet is {$this->name} and color is {$this->color}";
            // }

            public function intro() {
                echo "the pet is {$this->name} and color is {$this->color}";
            }
        }

        class Pig extends Animal {
            public $weight;

            public function __construct($name, $color, $weight) 
            {
                $this->name = $name;
                $this->color = $color;
                $this->weight = $weight;
            }

            public function sound() {
                echo "Am I a pig or dog?";
                // $this->intro();
            } 

            public function intro() {
                echo "the pet is {$this->name} and color is {$this->color} and weight is {$this->weight}";
            }
        }

        // $pig = new Pig("pig", "pink");

        // $pig->sound();

        $pig = new Pig("pig", "pink", 100);

        $pig->sound();
        $pig->intro();
    ?>

    
</body>
</html>
