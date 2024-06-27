<!DOCTYPE html>
<html>
<body>
    <?php
        class Animal{
            public $name;

            function getName() {
                return $this->name;
            }

            function setName($name) {
                $this->name = $name;
            }
        }

        $pig = new Animal();

        $pig->setName("piggy");
        
        echo $pig->getName();
    ?>

    
</body>
</html>
