<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
        $username = 'root';
        $password = '';
        $db = new PDO($dsn, $username, $password);
        // echo "<p>you are connected to the database</p>";
    } 
    
    catch(PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to
                the database: $error_message</p>";
        exit();
    }
    
    // page: 131

    $query = 'SELECT * FROM products';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();

    foreach($products as $product) {
        echo $product['productID'] . "<br>";
        echo $product['categoryID'] . "<br>";
        echo $product['productCode'] . "<br>";
        echo $product['productName'] . "<br>";
        echo $product['listPrice'] . "<br>" . "<br><br><br>";
        
    }

    // var_dump($categories);