<?php
    require_once('../model/database.php');
    require_once('../model/product.php');
    require_once('../model/category.php');
    require_once('../model/product_db.php');
    require_once('../model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if($action == null) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == null) $action = 'list_product';
    }

    switch($action) {
        case 'list_product':
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            if($category_id == null) $category_id = 1;

            // untuk nama category di bagian section
            $current_category = CategoryDB::getCategory($category_id);
            
            // untuk list categories di bagian aside
            $categories = CategoryDB::getCategories();

            // untuk item-item suatu product di bagian section
            $products = ProductDB::getProductByCategory($category_id);
            include('product_list.php');
            break;
        
        case 'delete_product':
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

            ProductDB::deleteProduct($product_id);

            // menuju ke index.php?category_id=3.. maka $action == null
            // menjadi $action ='list_product'
            // category_id = $category_id (dengan method GET)
            header("Location: .?category_id=$category_id");
        
        case 'show_add_form':
            // untuk list categories
            $categories = CategoryDB::getCategories();
            
            // untuk item-item suatu product
            $product = ProductDB::getProduct(1);

            include('add_product.php');

            break;
        
        case 'add_product':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $code = filter_input(INPUT_POST, 'code');
            $name = filter_input(INPUT_POST, 'name');
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

            $current_category = CategoryDB::getCategory($category_id);
            $product = new Product($current_category, $code, $name, $price);
            ProductDB::addProduct($product);

            // untuk list categories di bagian aside
            $categories = CategoryDB::getCategories();

            // untuk item-item suatu product di bagian section
            $products = ProductDB::getProductByCategory($category_id);
            include('product_list.php');
            break;

        case 'show_category':
            $categories = CategoryDB::getCategories();
            include('category_list.php');
            break;
        
        case 'delete_category':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $products = ProductDB::getProductByCategory($category_id);
            foreach($products as $product)
                ProductDB::deleteProduct($product->getID()); 
            $categories = CategoryDB::deleteCategory($category_id);

            header("Location: .?action=show_category");
            break;
        
        case 'add_category':
            $category_name = filter_input(INPUT_POST, 'categoryName');
            CategoryDB::addCategory($category_name);

            // untuk list categories di bagian aside
            $categories = CategoryDB::getCategories();

            header("Location: .?category_id=$category_id");
            break;

    }