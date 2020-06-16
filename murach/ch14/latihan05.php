<?php
    require('project/model/category.php');
    require('project/model/product.php');

    $brass = new Category(4, 'Brass');
    $trumpet = new Product($brass, 'Getzen','Getzen 700SP Trumpet', 999.95);

    // clone

    $trombone = clone $trumpet;
    $trombone->setPrice(699.95);
    echo $trumpet->getPrice() . "<br>";
    
    $result1 = ($trumpet == $trombone);
    echo "== $result1 == <br>"; // false

    
    // copy

    $trombone = $trumpet; 
    $trombone->setPrice(699.95);
    echo $trumpet->getPrice() . "<br>";

    $result2 = ($trumpet == $trombone);
    echo "== $result2 == <br>"; // true
