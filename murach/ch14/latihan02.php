<?php
	
	// CLASS CONSTANTS
	
	class Person {
		const GREEN_EYES = 1;
		const BLUE_EYES = 2;
		const BROWN_EYES = 3;
		
		private $eye_color;
		
		public function getEyeColor() {
			return $this->eye_color;
		}
		
		public function setEyeColor($value) {
			if($value == self::GREEN_EYES || 
				$value == self::BLUE_EYES || 
				$value == self::BROWN_EYES) {
					$this->eye_color = $value;
			}
			
			else {
				exit("eye color not set");
			}
		}
	}
	
	$person = new Person();
	$person->setEyeColor(Person::BLUE_EYES);
	
	echo "Eye Color: " . $person->getEyeColor();