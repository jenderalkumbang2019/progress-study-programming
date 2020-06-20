<?php
    require_once('../model/database.php');
    require_once('../model/product.php');
    require_once('../model/category.php');
    require_once('../model/product_db.php');
    require_once('../model/category_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if($action == null) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == null) $action = 'catalog_product';
    }

    switch($action) {
        case 'catalog_product':
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            if($category_id == null) $category_id = 1;

            // untuk nama category di bagian section
            $current_category = CategoryDB::getCategory($category_id);
            
            // untuk list categories di bagian aside
            $categories = CategoryDB::getCategories();

            // untuk item-item suatu product di bagian section
            $products = ProductDB::getProductByCategory($category_id);
            include('product_catalog.php');
            break;
        
        case 'view_product':
            // $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            // if($category_id == null) $category_id = 1;

            // untuk nama category di bagian section
            // $current_category = CategoryDB::getCategory($category_id);
            
            // untuk judul nama product di bagian section
            $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
            $product = ProductDB::getProduct($product_id);

            // // untuk list categories di bagian aside
            $categories = CategoryDB::getCategories();
            
            $file_image = '../images/' . $product->getCode() . '.png';
            include('product_view.php');
            break;
        
        case 'add_to_cart':
            $qty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT);
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            include('product_cart.php');
            break;
    }