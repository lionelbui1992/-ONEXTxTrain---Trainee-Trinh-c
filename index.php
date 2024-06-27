<!DOCTYPE html>
<html>
<body>
    <?php
        abstract class Animal{
            public $name;

            public function __construct($name)
            {
                $this->name = $name;
            }

            abstract public function sound(): string; 
        }

        class Pig extends Animal{
            public function sound(): string
            {
                return "the {$this->name} sound is ec ec";
            }
        }

        $pig = new Pig("pig");

        echo $pig->sound();
    ?>
</body>
</html>
