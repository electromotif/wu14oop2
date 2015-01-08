<?php

class Challenge {
	public $name;
	public $abilities = array ();
	public $description;
	
	// Methods

	public function __construct ($name, $abilities) {
		$this->name = $name;
		$this->abilities = $abilities;
	}
};

