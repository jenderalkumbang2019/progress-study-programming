<?php
	
	// -----------
	// update data
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
	
	$product_id = 28;
	$category_id = 12;
	$product_code = 'VPCS135FG';
	$product_name = 'Laptop Sony Vaio 135FG';
	$list_price = '15000';
	
	$query = "UPDATE products 
				SET categoryID = :category_id,
					productCode = :product_code,
					productName = :product_name,
					listPrice = :list_price
				WHERE productId = :product_id";
	
	$statement = $db->prepare($query);
	
	$statement->bindValue(':product_id', $product_id);
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

