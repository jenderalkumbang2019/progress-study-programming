<?php
    abstract class Person {
        protected $firstName, $lastName;
        private $phone, $email;

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

        abstract public function getFullName();

    }

    class Employee extends Person {
        private $cardNumber, $cardtype;

        public function __construct($first, $last, $phone, $email) {
            $this->phone = $phone;
            $this->email = $email;
            parent::__construct($first, $last);
        }

        public function setCardNumber($value) { $this->cardNumber = $value; }
        public function getCartNumber() { return $this->cardNumber; }
        public function setCardType($value) { $this->cardType = $value; }
        public function getCardType() { return $this->cardType; }

        public function getFullName() {
            return $this->getLastName() . ', ' . $this->getFirstName();
        }

    }

    $customer = new Employee('John', 'Doe', '919=555-4321', 'jdoe@example.com');

    echo "<p>" . $customer->getFullName() . "</p>";