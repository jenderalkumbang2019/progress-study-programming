<?php

// include('fields.php');

class Validate {
    private $fields;

    public function __construct() {
        $this->fields = new Fields();
    }

    // getFields == copyFields
    public function getFields() { 
        return $this->fields; 
    }
    
    // public function text('first_name', $first_name)
    // public function text('last_name', $last_name)

    // untuk input: $field->message()
    public function text($name, $value, $required = true, $min = 1, $max = 255) {
        
        $field = $this->fields->getField($name);

        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        if($required && empty($value)) {
            $field->setErrorMessage('Required.');
        }

        else if(strlen($value) < $min) {
            $field->setErrorMessage('Too short.');
        }

        else if(strlen($value) > $max) {
            $field->setErrorMessage('Too long.');
        }

        else {
            $field->clearErrorMessage();
        }


    }

    public function pattern($name, $value, $pattern, $message, $required = true) {
        $field = $this->fields->getField($name);
        
        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }
        
        $match = preg_match($pattern, $value);
        
        if($match === false) {
            $field->setErrorMessage('Error testing field.');
        }

        else if($match != 1) {
            $field->setErrorMessage($message);
        }

        else {
            $field->clearErrorMessage();
        }

    }

    public function phone($name, $value, $required = false) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        
        if($field->hasError()) { return; }

        $pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
        $message = 'Invalid phone number';
        $this->pattern($name, $value, $pattern, $message, $required);
    }

    public function email($name, $value, $required = true) {
        
        $field = $this->fields->getField($name);
        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }

        $this->text($name, $value, $required);
        if($field->hasError()) { return; }

        $parts = explode('@', $value);
        
        if(count($parts) < 2) {
            $field->setErrorMessage('At sign required.');
            return;
        }

        if(count($parts) > 2) {
            $field->setErrorMessage('Only one at sign allowed.');
            return;
        }

        // var_dump($field->getErrorMessage()); die();

        $local = $parts[0];
        $domain = $parts[1];

        if(strlen($local)>64) {
            $field->setErrorMessage('Username part too long.');
            return;
        }

        if(strlen($domain)>255) {
            $field->setErrorMessage('Domain name part too long.');
            return;
        }
        
        $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
        $dotatom = '(\.' . $atom . ')*';
        $address = '(^' . $atom . $dotatom . '$)';


        // Patterns for quoted text formatted local part
        $char = '([^\\\\"])';
        $esc  = '(\\\\[\\\\"])';
        $text = '(' . $char . '|' . $esc . ')+';
        $quoted = '(^"' . $text . '"$)';

        // Combined pattern for testing local part
        $localPattern = '/' . $address . '|' . $quoted . '/';

        // Call the pattern method and exit if it yields an error
        $this->pattern($name, $local, $localPattern, 'Invalid username part.');
        if ($field->hasError()) { return; }

        // Patterns for domain part
        $hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
        $hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
        $top = '\.[[:alnum:]]{2,6}';
        $domainPattern = '/^' . $hostnames . $top . '$/';

        // Call the pattern method
        $this->pattern($name, $domain, $domainPattern, 'Invalid domain name part.');

    }

    public function f_numeric($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        
        if($field->hasError()) { return; }

        $pattern = '/^[-+]?[0-9]*\.?[0-9]+$/';
        $message = 'Invalid number.';
        $this->pattern($name, $value, $pattern, $message, $required);
    }

    public function code($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        
        if($field->hasError()) { return; }
        $pattern = '/^[[:alnum:]]{1,5}$/';
        $message = 'Code must be characters';
        $this->pattern($name, $value, $pattern, $message, $required);
    }

}


// $validate = new Validate();

// // memanfaatkan copy nya variabel object misalnya $a = new A(); $b = $a;
// $fields = $validate->getFields();

// $fields->addField('first_name');
// $fields->addField('last_name');

// // echo $validate->getFields()->getField('last_name')->getMessage();

// $validate->text('first_name', 'Andi');
// $validate->text('last_name', 'Sujana');

// // var_dump($validate->getFields()->getField('first_name')->getMessage());

// $fields->addField('phone');
// $validate->phone('phone', '333-333-3333');

// $fields->addField('email');
// $validate->email('email', 'jenderalkumbang@gmail.com');

// var_dump($validate->getFields()->getField('email')->getMessage());