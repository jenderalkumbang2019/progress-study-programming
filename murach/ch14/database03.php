<?php

	try {
		$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
		$username = 'root';
		$password = '';
		
		$db = new PDO($dsn, $username, $password);
	}
	
	catch(PDOException $e) {
		$error_message = 'Error: ' . $e->getMessage();
		exit();
	}
	
	$category_id = 1;
	
	$query = 'SELECT * FROM products WHERE categoryID = :category_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':category_id', $category_id);
	$statement->execute();
	
	$products = $statement->fetchAll();
	
	$statement->closeCursor();
	
	foreach($products as $product) {
		echo $product['productName'] . "<br>";
	}
	
	
	