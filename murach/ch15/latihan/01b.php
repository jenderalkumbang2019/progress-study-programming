<?php

    $teks = "Dari awal saya bilang juga ndak apa-apo ".
    "mo Perl kek, PHP kek, Java kek ".
    "bahasa-basi laen kek, semua oke!";

    $n = 0;

    preg_match_all("/((\w+)-.+? )/", $teks, $matches, PREG_SET_ORDER);

    echo "Total = ".count($matches)." kata ulang, yaitu :<br />";

    for ($i=0; $i < count($matches); $i++) {

        echo $matches[$i][1]. "<br />";
        $n++;

    }

?>