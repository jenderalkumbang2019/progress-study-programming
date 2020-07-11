<?php
	require('../model/database.php');
	require('../model/category_db.php');
	require('../model/product_db.php');
	
	$action = filter_input(INPUT_POST, 'action');
	if ($action == null) {
		$action = filter_input(INPUT_GET, 'action');
		if ($action == null) {
			$action = 'catalog_product';
		}
	}
	
	if ($action == 'catalog_product') {

		$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
		if ($category_id == null || $category_id == false) {
			$category_id = 1;
		}
		
		$categories = get_categories();
		$category_name = get_category_name($category_id);
		$products = get_products_by_category($category_id);
	
		include('./product_catalog.php');
	} 
	
	else if ($action == 'view_product') {
		
		$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
		
		if ($product_id == null || $product_id == false) {
			$error = "Missing or incorrect product id.";
			include('../errors/error.php');
		} else {
			$categories = get_categories();
			$product = get_product($product_id);
			
			$name = $product['productName'];
			$code = $product['productCode'];
			$price = $product['listPrice'];
			
			$discount_percent = 30;
			$discount_amount = round($price * ($discount_percent / 100.0), 2);
			$unit_price = $price - $discount_amount;
			
			$discount_amount_f = number_format($discount_amount, 2);
			$unit_price_f = number_format($unit_price, 2);
			
			$image_fileName = '../images/' . $code . '.png';
			$image_alt = 'Image: ' . $code . '.png';
			
			include('./product_view.php');
		}
	}
	
	else if ($action == 'add') {
		
		$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
		$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
		
		if ($quantity == null || $quantity == false) {
			$error = "Missing or incorrect quantity.";
			include('../errors/error.php');
		} else {
			
			include('.//product_cart.php');
			
		}
	}
	
?>