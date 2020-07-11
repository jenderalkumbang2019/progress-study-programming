<?php

    // public function __construct($id=null, $name=null);
    // public function getID();
    // public function setID($value);
    // public function getName();
    // public function setName($value);

    class Category {
        private $id, $name;
        
        public function __construct($id=null, $name=null) {
            $this->id = $id;
            $this->name = $name;
        }
        
        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($value) {
            $this->name = $value;
        }

    }

    // $cat1 = new Category(123, 'komputer01');
    // echo $cat1->getID() . "<br>";

    // $cat1->setID(456);
    // echo $cat1->getID() . "<br>";

    // echo $cat1->getName() . "<br>";

    // $cat1->setName('Laptop01');
    // echo $cat1->getName() . "<br>";
