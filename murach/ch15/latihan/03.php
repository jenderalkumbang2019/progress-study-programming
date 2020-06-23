<?php
    $pattern = '/^(?=.*[[:digit:]])[[:alnum:]]{6}$/';

    echo preg_match($pattern, 'Harri5') . "<br>";