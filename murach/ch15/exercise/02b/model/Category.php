<?php

    // public function __construct($id=null, $name=null);
    // public function getID();
    // public function setID($value);
    // public function getName();
    // public function setName($value);

    class Category {
        private $id, $name;
        
        public function __construct() {
            $this->id = 0;
            $this->name = '';
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
