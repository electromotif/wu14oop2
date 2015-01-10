<?php

class Challenge {
	public $name;
	public $description;
	public $abilities = array ();
	
	// Methods

	public function __construct ($name, $description, $abilities) {
		$this->name = $name;
		$this->description = $description;
		$this->abilities = $abilities;
	}
};

