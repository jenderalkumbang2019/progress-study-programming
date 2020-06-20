<?php
    class Person {
        private $firstName, $lastName, $phone, $email;

        public function __construct($first, $last) {
            $this->firstName = $first;
            $this->lastName = $last;
        }

        public function setFirstName($value) { $this->firstName = $value; }
        public function getFirstName() { return $this->firstName; }
        public function setLastName($value) { $this->lastName = $value; }
        public function getLastName() { return $this->lastName; }
        public function setPhone($value) { $this->phone = $value; }
        public function getPhone() { return $this->phone; }
        public function setEmail($value) { $this->email = $value; }
        public function getEmail() { return $this->email; }
    }

    class Employee extends Person {
        private $ssn, $hireDate;

        public function __construct($first, $last, $ssn, $hireDate) {
            $this->ssn = $ssn;
            $this->hireDate = $hireDate;
            parent::__construct($first, $last);
        }

        public function setSSN($value) { $this->ssn = $value; }
        public function getSSN() { return $this->ssn; }
        public function setHireDate($value) { $this->hireDate = $value; }
        public function getHireDate() { return $this->hireDate; }

    }

    $emp = new Employee('John', 'Doe', '999-14-3456', '8-25-1996');
    $emp->setPhone('919=555-4321');