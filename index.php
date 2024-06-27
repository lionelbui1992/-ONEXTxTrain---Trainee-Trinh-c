<!DOCTYPE html>
<html>
<body>
    <?php
        class Animal{
            public $name;
            protected $color;
            private $weight;

            public function setName($n) {
                $this->name = $n;
            }

            protected function setColor($c) {
                $this->color = $c;
            }

            private function setWeight($w) {
                $this->weight = $w;
            }
        }

        $pig = new Animal();
        $pig->name = "piggy";
        //echo $pig->color = "red"; error
        //echo $pig->weight = 100; error
        $pig->setName("pigg");
        //$pig->setColor("yellow"); error
        //$pig->setWeight(200); error 
    ?>

    
</body>
</html>
