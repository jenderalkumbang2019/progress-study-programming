<?php
	
	// -----------
	// insert data
	// -----------
	
	$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
	$username = 'root';
	$password = '';
	
	try {
		$db = new PDO($dsn, $username, $password);
	}
	
	catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo "Error: " . $error_message;
		exit();
	}
	
	$category_id = 12;
	$product_code = 'VPCS135FH';
	$product_name = 'Laptop Sony Vaio 135FH';
	$list_price = '16000';
	
	$query = "INSERT INTO products(categoryID, productCode, productName, listPrice)
				VALUES(:category_id, :product_code, :product_name, :list_price)";
	
	$statement = $db->prepare($query);
	
	$statement->bindValue(':category_id', $category_id);
	$statement->bindValue(':product_code', $product_code);
	$statement->bindValue(':product_name', $product_name);
	$statement->bindValue(':list_price', $list_price);
	
	$statement->execute();
	
	
	
	// -------------
	// show products
	// -------------
	
	$query = "SELECT * FROM products";
	$statement = $db->prepare($query);
	$statement->execute();
	$products = $statement->fetchAll();
	$statement->closeCursor();
	
	include('show_products.php');
	
?>

