<?php
	require('../model/database.php');
	require('../model/category.php');
	require('../model/category_db.php');
	require('../model/product.php');
	require('../model/product_db.php');
	
	// require('../model/CategoryDB.php');
	// require('../model/ProductDB.php');

	require('../model/Fields.php');
	require('../model/Validate.php');

	$validate = new Validate();
	$fields = $validate->getFields();
	$fields->addField('code', 'Must be less than 5 characters.');
	$fields->addField('name', 'Must be less than 20 characters.');
	$fields->addField('price', 'Must be a valid number.');
	
	$action = filter_input(INPUT_POST, 'action');
	if ($action == null) {
		$action = filter_input (INPUT_GET, 'action');
		if ($action == null) {
			$action = 'list_products';
		}
	}
	
	if ($action == 'list_products') {
		$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
		if ($category_id == null || $category_id == false) {
			$category_id = 1;
		}
		
		$categories = get_categories();
		$category_name = get_category_name($category_id);
		$products = get_products_by_category($category_id);
		
		include('product_list.php');	
	} 
	
	else if ($action == 'delete_product') {			
		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
		$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
		
		if ($category_id == null || $category_id == false ||
			$product_id == null || $product_id == false) {
				$error = "Missing or incorrect product id or category id.";
				include('../errors/error.php');
		} 
		
		else {
				delete_product($product_id);
				header("Location: .?category_id=$category_id");
		}
	
	} 
	
	else if ($action == 'show_add_form') {

		$code = '';
		$name = '';
		$price = '';
	
		// ----- //
		$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
		
		if ($category_id == null || $category_id == false) {
			$error = "Invalid product data. Check all fields and try again.";
			include('../errors/error.php');
		}
		// ----- //

		$categories = get_categories();
		include('./product_add.php');
	}
		
	else if ($action == 'add_product') {
		
		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
		$code = filter_input(INPUT_POST, 'code');
		$name = filter_input(INPUT_POST, 'name');
		$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

		$validate->text('code', $code, true, 1, 10);
		$validate->text('name', $name);
		$validate->f_numeric('price', $price);
		
		if($fields->hasErrors()) {
			// $categories = CategoryDB::getCategories();
			$error = "Invalid product data. Check all fields and try again.";
			include('../errors/error.php');
			// include('./product_add.php');
		}

		// if ($category_id == null || $category_id == false ||
		// 	$code == null || $name == null || $price == null || $price == false) {
		// 		$error = "Invalid product data. Check all fields and try again.";
		// 		include('../errors/error.php');
		// } 
		
		else {
			add_product($category_id, $code, $name, $price);
			header("Location: .?category_id=$category_id"); // ?????
			// !!!!! karena $action == null maka $action = "list_product"; (hint: lihat atas)
			// $category_id sudah ada nilainya ... maka ditampilkanlah yg ada ... <mantap>
		}
	}
	
	else if ($action == 'list_categories') {
		$categories = get_categories();
		include('./category_list.php');
	}
	
	else if ($action == 'delete_category') {
		
		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
		
		if ($category_id == null || $category_id == false) {
				$error = "Missing or incorrect category name.";
				include('../errors/error.php');
		} 
		
		else {
				$products = get_products_by_category($category_id);
				
				foreach($products as $product) {
					$product_id = get_product_id($product);
					delete_product($product_id);
				}
				
				delete_category($category_id);
				
				$categories = get_categories();
				header("Location: .?action=list_categories");
				// lihat bagian $action == "list_categories"; diatas ...
		}
		
	}
	
	else if ($action == 'add_category') {
		$name = filter_input(INPUT_POST, 'name');
		
		if ($name == null) {
				$error = "Invalid category data. Check all fields and try again.";
				include('../errors/error.php');
		} 
		
		else {
			add_category($name);
			$categories = get_categories();
			header("Location: .?action=list_categories");
			// lihat bagian $action == "list_categories"; diatas ...
		}
	}
?>