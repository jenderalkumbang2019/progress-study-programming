<?php

// public function __construct($category, $code, $name, $price);
// public function getCategory();
// public function setCategory($value);
// public function getID();
// public function setID($value);
// public function getCode();                 
// public function setCode($value);    
// public function getName();
// public function setName($value);
// public function getPrice();
// public function getPriceFormatted();
// public function setPrice($value);
// public function getDiscountPercent();
// public function getDiscountAmount();
// public function getDiscountPrice();
// public function getImageFilename();
// public function getImagePath();
// public function getImageAltText();

    class Product {
        
        private $category, $id, $code, $name, $price;

        public function __construct($category, $code, $name, $price) {
            $this->category = $category;
            $this->code = $code;
            $this->name = $name;
            $this->price = $price;
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory($value) {
            $this->category = $value;
        }

        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
        }

        public function getCode() {
            return $this->code;
        }

        public function setCode($value) {
            $this->code = $value;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($value) {
            $this->name = $value;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getPriceFormatted() {
            $formatted_price = number_format($this->price, 2);
            return $formatted_price;
        }

        public function setPrice($value) {
            $this->price = $value;
        }

        public function getDiscountPercent() {
            $discount_percent = 30;
            return $discount_percent;
        }

        public function getDiscountAmount() {
            $discount_percent = $this->getDiscountPercent() / 100;
            $discount_amount = $this->price * $discount_percent;
            $discount_amount_r = round($discount_amount, 2);
            $discount_amount_f = number_format($discount_amount_r, 2);
            return $discount_amount_f;
        }

        public function getDiscountPrice() {
            $discount_price = $this->price - $this->getDiscountAmount();
            $discount_price_f = number_format($discount_price, 2);
            return $discount_price_f;
        }

        public function getImageFilename() {
            $image_filename = $this->code . ".png";
            return $image_filename;
        }

        public function getImagePath() {
            $image_path = '../images/' . $this->getImageFilename();
            return $image_path;
        }

        public function getImageAltText() {
            $image_alt = 'Image: ' . $this->getImageFilename();
            return $image_alt;
        }
    }

    // require('category.php');

    // $brass = new Category(4, 'Brass');

    // $trumpet = new Product($brass, 'Getzen', 'Getzen 700SP Trumpett', 999.95);

    // // $category, $code, $name, $price;
    // $trumpet->setprice(2000);
    // echo $trumpet->getImageAltText();

