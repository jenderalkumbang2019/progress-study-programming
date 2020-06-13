<?php
	
	// --------------
	// delete product
	// --------------
	
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
	
	$product_id = 28;
	
	$query = "DELETE FROM products 
				WHERE productId = :product_id";
	
	$statement = $db->prepare($query);
	
	$statement->bindValue(':product_id', $product_id);
	
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

