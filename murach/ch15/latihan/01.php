<?php
    // preg_match

    $pattern = '/Harris/i';

    $author = 'Ray harris';
    $editor = 'Joel Murach';

    $author_match = preg_match($pattern, $author);
    $editor_match = preg_match($pattern, $editor);

    if($author_match === false) {
        echo 'Error testing author name.';
    }

    else if($author_match === 0) {
        echo 'Aothor name does not contain Harris.';
    }

    else {
        echo 'Author name contains Harris.';
    }