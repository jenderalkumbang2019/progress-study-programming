<?php

    $string = 'The product code is  MBT-3461.';

    echo $string . "<br>";

    echo preg_match('/MB./', $string) . "<br>";
    echo preg_match('/MB\d/', $string) . "<br>";
    echo preg_match('/MBT-\d/', $string) . "<br>";
    echo preg_match('/MB[TF]/', $string) . "<br>";
    echo preg_match('/./', $string) . "<br>";
    echo preg_match('/[13579]/', $string) . "<br>";

    $editor =  'Anne Bohme';
    echo preg_match('/Anne\b/', $editor) . "<br>";
