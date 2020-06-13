<?php
	
	// STATIC PROPERTY AND STATIC METHOD
	
	class Category {
		
		private $id, $name;
		
		private static $objectCount = 0;
		
		public function __construct($id, $name) {
			$this->id = $id;
			$this->name = $name;
			self::$objectCount++;
		}
		
		public static function getObjectCount() {
			return self::$objectCount;
		}
		
	}
	
	$brass = new Category('1', 'Guitars');
	$brass = new Category('2', 'Bass');
	echo '<p>Object count: ' . Category::getObjectCount() . '</p>';
	
	$brass = new Category('3', 'Drums');
	echo '<p>Object count: ' . Category::getObjectCount() . '</p>';