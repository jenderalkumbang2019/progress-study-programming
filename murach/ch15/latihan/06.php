<?php
    // regular expression for data validation

    // phone number1 999=999-9999
    $phone1 = '558-555-6624';
    $phone1_pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';

    // phone number 999=999-9999
    $phone2 = '081377816314'; //+6281377816314
    $phone2_pattern = '/^0[5-9][[:digit:]]{10}$/';

    // date: mm/dd/yyyy
    $date = '8/10/2090';
    // $date_pattern = '/^0?[1-9]|1[0-2]\/[0-3] $/';
    $date_pattern = '/^(0?[1-9]|1[0-2])\/'
                    . '(0?[1-9]|[12][[:digit:]]|3[01])\/'
                    . '([[:digit:]]{4})$/';
    
    // email
    $email = 'JenderalKumbang2019@gmail.com';
    $result = false;
    $parts = explode("@", $email);

    if(count($parts) == 2)
        if(strlen($parts[0] <= 64))
            if(strlen($parts[1] <= 255)) {
                // $atom = '[[:alnum:]_!#$%&\'*+\/=?^`\{|}@~-]+';
                $atom = '/^([\.[:alnum:]_!#$%&\'*+\/=?^`\{|}@~-]+)$/';
            } else echo 'gagal';



    $result = preg_match($atom, $email, $matched);
    var_dump($matched[0]);
    