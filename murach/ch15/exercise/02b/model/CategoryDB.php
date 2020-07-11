<?php

    // public static function getCategory($category_id);
    // public static function getCategories();

    // require_once('database.php');
    // require_once('category.php');

    class CategoryDB {
        public function getCategory($category_id) {
            $db = Database::getDB();
            $query = "SELECT * FROM categories WHERE categoryID = :category_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            
            // $category = new Category($row['categoryID'], $row['categoryName']);
            $category = new Category();
            $category->setID($row['categoryID']);
            $category->setName($row['categoryName']);

            return $category;
        }

        public function getCategories() {
            $db = Database::getDB();
            $query = "SELECT * FROM categories";
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $categories = array();
            foreach($rows as $row) {
                $category = new Category();
                $category->setID($row['categoryID']);
                $category->setName($row['categoryName']);
                $categories[] = $category;
            }
            
            return $categories;
        }

        public function deleteCategory($category_id) {
            $db = Database::getDB();

            $query = "DELETE FROM categories WHERE categoryID = :category_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        }

        public function addCategory($category_name) {
            $db = Database::getDB();

            $query = "INSERT INTO categories (categoryName) VALUE (:category_name)";
            $statement = $db->prepare($query);
            $statement->bindValue(':category_name', $category_name);
            $statement->execute();
            $statement->closeCursor();
        }
        
    }

