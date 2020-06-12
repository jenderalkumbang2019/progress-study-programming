<?php
	
	// -------------
	// Show Products
	// -------------
	
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
	
	$query = "SELECT * FROM products";
	$statement = $db->prepare($query);
	$statement->execute();
	$products = $statement->fetchAll();
	$statement->closeCursor();
	
	include('show_products.php');
	
?>

