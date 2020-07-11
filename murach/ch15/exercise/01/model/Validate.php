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

        // $pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
        $pattern = '/^\d{3}-\d{3}-\d{4}$/';
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

        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $field->setErrorMessage('Email is not a valid address.');
          } else $field->clearErrorMessage();

    }

    /*
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
    */


    public function password($name, $password, $required = true) {
        $field = $this->fields->getField($name);

        if (!$required && empty($password)) {
            $field->clearErrorMessage();
            return;
        }

        // $this->text($name, $password, $required, 6);
        $this->text($name, $password, $required, 8);
        if ($field->hasError()) { return; }

        // Patterns to validate password
        // NOT SPECIAL CHARACTER
        $charClasses = array();
        $charClasses[] = '[:digit:]';
        $charClasses[] = '[:upper:]';
        // $charClasses[] = '[:lower:]';
        // $charClasses[] = '_-';

        $pw = '/^';
        $valid = '[';
        foreach($charClasses as $charClass) {
            $pw .= '(?=.*[' . $charClass . '])';
            $valid .= $charClass;
        }
        // $valid .= ']{6,}';
        $valid .= ']{8,}';
        $pw .= $valid . '$/';

        $pwMatch = preg_match($pw, $password);

        if ($pwMatch === false) {
            $field->setErrorMessage('Error testing password.');
            return;
        } else if ($pwMatch != 1) {
            $field->setErrorMessage(
                    'Must have one each of upper, lower, digit, and "-_".');
            return;
        }
    }

    public function verify_password($name, $password, $verify_password, $required = true) {
        $field = $this->fields->getField($name);

        $this->text($name, $verify_password, $required, 6);
        if($field->hasError()) { return; }

        if(strcmp($password, $verify_password) != 0) {
            $field->setErrorMessage('Passwords do not match.');
            return;
        }   
    }

    public function state($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        $states = array(
            'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC',
            'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY',
            'LA', 'ME', 'MA', 'MD', 'MI', 'MN', 'MS', 'MO', 'MT',
            'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH',
            'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT',
            'VT', 'VA', 'WA', 'WV', 'WI', 'WY');

        // implode -> membuat array menjadi string dengan antaranya adalah |
        $states = implode('|', $states);
        $pattern = '/^(' . $states . ')$/';
        $this->pattern($name, $value, $pattern, 'Invalid state.', $required);
    }

    public function zip_code($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        // $pattern = '/^[[:digit:]]{5}(-[[:digit:]]{4})?$/';
        $pattern = '/^\d{5}(-\d{4})?$/';
        $message = 'Invalid zip code.';
        $this->pattern($name, $value, $pattern, $message, $required);
    }

    public function card_type($name, $value, $required = true) {
        $field = $this->fields->getField($name);
        $this->text($name, $value, $required);
        if ($field->hasError()) { return; }

        $types = array();
        $types[] = 'm';
        $types[] = 'v';
        $types[] = 'a';
        $types[] = 'd';
        $types = implode('|', $types);
        $pattern = '/^' . $types . '$/';

        $message = 'Invalid card type.';
        $this->pattern($name, $value, $pattern, $message, $required);
    }

    public function card_number($name, $value, $type) {
        $field = $this->fields->getField($name);
        switch ($type) {
            case 'm':  // MasterCard
                $prefixes = '51-55';
                $lengths  = '16';
                break;
            case 'v':  // Visa
                $prefixes = '4';
                $lengths  = '13,16';
                break;
            case 'a':  // American Express
                $prefixes = '34,37';
                $lengths  = '15';
                break;
            case 'd':  // Discover
                $prefixes = '6011,622126-622925,644-649,65';
                $lengths  = '16';
                break;
            case '':   // No card type selected.
                $field->clearErrorMessage();
                return;
            default:
                $field->setErrorMessage('Invalid card type.');
                return;
        }
        // Check lengths
        $lengths = explode(',', $lengths);
        $validLengths = false;
        foreach($lengths as $length) {
            $pattern = '/^[[:digit:]]{' . $length . '}$/';
            if (preg_match($pattern, $value) === 1) {
                $validLengths = true;
                break;
            }
        }
        if ( ! $validLengths ) {
            $field->setErrorMessage('Invalid card number length.');
            return;
        }
        // Check prefix
        $prefixes = explode(',', $prefixes);
        $rangePattern = '/^[[:digit:]]+-[[:digit:]]+$/';
        $validPrefix = false;
        foreach($prefixes as $prefix) {
            if (preg_match($rangePattern, $prefix) === 1) {
                $range = explode('-', $prefix);
                $start = intval($range[0]);
                $end = intval($range[1]);
                for( $prefix = $start; $prefix <= $end; $prefix++ ) {
                    $pattern = '/^' . $prefix . '/';
                    if (preg_match($pattern, $value) === 1) {
                        $validPrefix = true;
                        break;
                    }
                }
            } else {
                $pattern = '/^' . $prefix . '/';
                if (preg_match($pattern, $value) === 1) {
                    $validPrefix = true;
                    break;
                }
            }
        }
        if ( ! $validPrefix ) {
            $field->setErrorMessage('Invalid card number prefix.');
            return;
        }
        // Validate checksum
        $sum = 0;
        $length = strlen($value);
        for ($i = 0; $i < $length; $i++) {
            $digit = intval($value[$length - $i - 1]);
            $digit = ( $i % 2 == 1 ) ? $digit * 2 : $digit;
            $digit = ($digit > 9) ? $digit - 9 : $digit;
            $sum += $digit;
        }
        if ( $sum % 10 != 0 ) {
            $field->setErrorMessage('Invalid card number checksum.');
            return;
        }
        $field->clearErrorMessage();

    }

    public function exp_date($name, $value) {
        $field = $this->fields->getField($name);
        $datePattern = '/^(0[1-9]|1[012])\/[1-9][[:digit:]]{3}?$/';
        $match = preg_match($datePattern, $value);
        if ( $match === false ) {
            $field->setErrorMessage('Error testing field.');
            return;
        }
        if ( $match != 1 ) {
            $field->setErrorMessage('Invalid date format.');
            return;
        }
        $dateParts = explode('/', $value);
        $month = $dateParts[0];
        $year  = $dateParts[1];
        $dateString = $month . '/01/' . $year . ' last day of 23:59:59';
        $exp = new \DateTime($dateString);
        $now = new \DateTime();
        if ( $exp < $now ) {
            $field->setErrorMessage('Card has expired.');
            return;
        }
        $field->clearErrorMessage();
    }

    public function birthdate($name, $value) {
        $field = $this->fields->getField($name);
        // $datePattern = '/^(0[1-9]|1[012])\/[1-9][[:digit:]]{3}?$/';
        $datePattern = '/^(0[1-9]|1[012])\/([0-2][1-9]|3[0-1])\/[1-9][[:digit:]]{3}?$/';
        $match = preg_match($datePattern, $value);
        if ( $match === false ) {
            $field->setErrorMessage('Error testing field.');
            return;
        }
        if ( $match != 1 ) {
            $field->setErrorMessage('Invalid date format.');
            return;
        }
        $dateParts = explode('/', $value);
        $month = $dateParts[0];
        $date  = $dateParts[1];
        $year  = $dateParts[2];
        // $dateString = $month . '/'. $date . '/' . $year . ' last day of 23:59:59';
        $dateString = $month . '/'. $date . '/' . $year;
        $exp = new \DateTime($dateString);
        $now = new \DateTime();

        // var_dump($dateString); 
        // echo "<br>";
        // var_dump($now); 
        // die();

        if ( $exp > $now ) {
            $field->setErrorMessage('Birthdate can\'t be in the future.');
            return;
        }
        $field->clearErrorMessage();
    }    

        
}


// $validate = new Validate();

// memanfaatkan copy nya variabel object misalnya $a = new A(); $b = $a;
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

// $fields->addField('password');
// $validate->password('password', 'Supe ru9-');

// $fields->addField('verify_password');
// $validate->verify_password('verify_password', 'Supe ru9-', 'Supe ru8-');

// $fields->addField('zip_code');
// $validate->zip_code('zip_code', '30127');


// echo($validate->getFields()->getField('zip_code')->getMessage()); die();