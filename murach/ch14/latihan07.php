<?php
    
    // menampilkan property suatu class

    class Employee {
        public $firstName, $lastName;
        private $ssn, $dob;

        public function __construct($first, $last) {
            $this->firstName = $first;
            $this->lastName = $last;
        }

        public function getSSN() {
            return $this->ssn;
        }

        public function setSSN($value) {
            $this->ssn = $value;
        }

        public function getDOB() {
            return $this->dob;
        }

        public function setDOB($value) {
            $this->dob = $value;
        }

        public function showAll() {
            echo "<ul>";
            foreach($this as $key=>$value) {
                echo "<li>$key = $value</li>";
            }
            echo "</ul>";
        }

    }

    $employee = new Employee('John', 'Doe');
    $employee->setSSN('999-14-3456');
    $employee->setDOB('3-15-1970');
    $employee->showAll();

    echo "<ul>";
    foreach($employee as $key => $value) {
        echo "<li>$key = $value</li>";
    }
    echo "</ul>";