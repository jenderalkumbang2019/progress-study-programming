<?php

    // preg_split

    $items = 'MBT-6745 MBS-5729, MBT-6824, and MBS-5214';

    $pattern = '/[, ]+(and[ ]*)?/';

    $items = preg_split($pattern, $items);

    
    foreach( $items as $item ) {
        echo '<li>' . $item . '</li>';
    }

