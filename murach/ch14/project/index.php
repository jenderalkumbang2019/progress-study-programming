<?php

    require_once('model/database.php');
    require_once('model/product.php');
    require_once('model/category.php');
    require_once('model/product_db.php');
    require_once('model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if($action == null) {
        $action = 'list_product';
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
            include('view/product_list.php');
            break;
        
        case 'delete_product':
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

            ProductDB::deleteProduct($product_id);

            // menuju ke index.php?category_id=3.. maka $action == null
            // menjadi $action ='list_product'
            // category_id = $category_id (dengan method GET)
            header("Location: .?category_id=$category_id");

    }

    

    
    