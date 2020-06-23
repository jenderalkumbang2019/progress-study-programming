<?php
    
    $pw_pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{6,}$/';
    $str = 'sup3re(ret';

    echo preg_match($pw_pattern, $str) . "<br>";
