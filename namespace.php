<?php
    namespace NS;

    class Animal{
        public $name = "";

        public function pet() {
            echo "the pet is {$this->name}";
        }
    }
?>