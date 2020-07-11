<?php
    require_once('../model/Database.php');
    require_once('../model/Product.php');
    require_once('../model/Category.php');
    require_once('../model/ProductDB.php');
    require_once('../model/CategoryDB.php');

    require_once('../model/Fields.php');
    require_once('../model/Validate.php');


    $categorydb = new CategoryDB();
    $productdb = new ProductDB();

    $validate = new Validate();
    $fields = $validate->getFields();
    $fields->addField('code', 'Maximal 6 characters.');
    $fields->addField('name', 'Maximal 20 characters.');
    $fields->addField('price', 'Must be a valid number.');

    $action = filter_input(INPUT_POST, 'action');
    if($action == null) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == null) $action = 'list_product';
    }

    switch($action) {
        case 'list_product':
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            
            if($category_id == null) {
                $category_id = 1;
            }

            // untuk nama category di bagian section
            $current_category = $categorydb->getCategory($category_id);

            // untuk list categories di bagian aside
            $categories = $categorydb->getCategories();

            // untuk item-item suatu product di bagian section
            $products = $productdb->getProductByCategory($current_category->getID());
            include('product_list.php');
            break;
        
        case 'delete_product':
            $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

            $productdb->deleteProduct($product_id);

            // menuju ke index.php?category_id=3.. maka $action == null
            // menjadi $action ='list_product'
            // category_id = $category_id (dengan method GET)
            header("Location: .?category_id=$category_id");
        
        case 'show_add_form':
            // untuk list categories
            $categories = $categorydb->getCategories();
            
            // untuk item-item suatu product
            $product = $productdb->getProduct(1);

            $code = '';
            $name = '';
            $price = '';

            include('add_product.php');

            break;
        
        case 'add_product':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $code = filter_input(INPUT_POST, 'code');
            $name = filter_input(INPUT_POST, 'name');
            // $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $price = filter_input(INPUT_POST, 'price');

            $validate->text('code', $code, true, 1, 5);
            $validate->text('name', $name);
            $validate->f_numeric('price', $price);

            if($fields->hasErrors()) {
                // untuk list categories
                $categories = $categorydb->getCategories();
                // untuk item-item suatu product
                $product = $productdb->getProduct(1);

                include('add_product.php');
            }

            else {

                $current_category = $categorydb->getCategory($category_id);

                $product = new Product();
                $product->setCategory($current_category);
                $product->setCode($code);
                $product->setName($name);
                $product->setPrice($price);


                $productdb->addProduct($product);

                // untuk list categories di bagian aside
                $categories = $categorydb->getCategories();

                // untuk item-item suatu product di bagian section
                $products = $productdb->getProductByCategory($category_id);
                include('product_list.php');
            }

            break;

        case 'show_category':
            $categories = $categorydb->getCategories();
            include('category_list.php');
            break;
        
        case 'delete_category':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $products = $productdb->getProductByCategory($category_id);
            foreach($products as $product)
                $productdb->deleteProduct($product->getID()); 
            $categories = $categorydb->deleteCategory($category_id);

            header("Location: .?action=show_category");
            break;
        
        case 'add_category':
            $category_name = filter_input(INPUT_POST, 'categoryName');
            $categorydb->addCategory($category_name);

            // untuk list categories di bagian aside
            $categories = $categorydb->getCategories();

            header("Location: .?category_id=$category_id");
            break;

    }