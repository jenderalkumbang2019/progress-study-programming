<?php
    require('model/Fields.php');
    require('model/Validate.php');

    $validate = new Validate();
    $fields = $validate->getFields();
    
    $fields->addField('email', 'Must be a valid email address.');
    $fields->addField('password', 'Must be at least 6 characters.');
    $fields->addField('verify_password');

    $fields->addField('first_name');
    $fields->addField('last_name');
    $fields->addField('address');
    $fields->addField('city');
    $fields->addField('state', 'Use 2 character abbreviation.');
    $fields->addField('zip_code', 'Use 5 or 9 digit ZIP code.');
    $fields->addField('phone', 'Use 888-555-1234 format.');
    $fields->addField('birthdate', 'Use mm/dd/yyyy format.');

    $fields->addField('card_type');
    $fields->addField('card_number', 'Enter number with or without dashes.');
    $fields->addField('exp_date', 'Use mm/yyyy format.');

    $action = filter_input(INPUT_POST, 'action');
    if($action == null) {
            $action = 'reset';
        } 
    
    else {
            $action = strtolower($action);
        }

    switch($action) {
        case 'reset':
            $email = '';
            $password = '';
            $verify_password = '';

            $first_name = '';
            $last_name = '';
            $address = '';
            $city = '';
            $state = '';
            $zip_code = '';
            $phone = '';
            $birthdate = '';

            $card_type = '';
            $card_number = '';
            $exp_date = '';
            
            include('view/register.php');
            break;

        case 'register':
            // initial
            $email = trim(filter_input(INPUT_POST, 'email'));
            $password = filter_input(INPUT_POST, 'password');
            $verify_password = filter_input(INPUT_POST, 'verifyPassword');

            $first_name = trim(filter_input(INPUT_POST, 'firstName'));
            $last_name = trim(filter_input(INPUT_POST, 'lastName'));
            $address = trim(filter_input(INPUT_POST, 'address'));
            $city = trim(filter_input(INPUT_POST, 'city'));
            $state = filter_input(INPUT_POST, 'state');
            $zip_code = filter_input(INPUT_POST, 'zipCode');
            $phone = filter_input(INPUT_POST, 'phone');
            $birthdate = filter_input(INPUT_POST, 'birthdate');

            $card_type = filter_input(INPUT_POST, 'cardType');
            $card_number = filter_input(INPUT_POST, 'cardNumber');
            // bila bukan digit dihilangkan atau ''
            $card_number = preg_replace('/[^[:digit:]]/', '', $card_number);
            $exp_date = filter_input(INPUT_POST, 'expDate');
            
            // validate
            $validate->email('email', $email);
            $validate->password('password', $password);
            $validate->verify_password('verify_password', $password, $verify_password);
            
            $validate->text('first_name', $first_name);
            $validate->text('last_name', $last_name);
            $validate->text('address', $address, false);
            $validate->text('city', $city, false);
            $validate->state('state', $state, false);
            $validate->zip_code('zip_code', $zip_code, false);
            $validate->phone('phone', $phone, true);
            $validate->birthdate('birthdate', $birthdate, true);

            $validate->card_type('card_type', $card_type, true);
            $validate->card_number('card_number', $card_number, $card_type);
            $validate->exp_date('exp_date', $exp_date);

            if($fields->hasErrors()) {
                include('view/register.php');
            }

            else {
                include('view/success.php');
            }
            
            break;

    }
