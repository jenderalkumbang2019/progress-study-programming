<?php

    // require_once('database.php');
    // require_once('category.php');

    class CategoryDB {
        public static function getCategory($category_id) {
            $db = Database::getDB();
            $query = "SELECT * FROM categories WHERE categoryID = :category_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            
            $category = new Category($row['categoryID'], $row['categoryName']);
            return $category;
        }

        public static function getCategories() {
            $db = Database::getDB();
            $query = "SELECT * FROM categories";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $categories = array();
            foreach($rows as $row) {
                $category = new Category($row['categoryID'], $row['categoryName']);
                $categories[] = $category;
            }
            
            return $categories;
        }
        
        
    }

    // $categories = CategoryDB::getCategories();
    // var_dump($categories);

    // $category = CategoryDB::getCategory(1);
    // var_dump($category);
