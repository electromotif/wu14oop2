<?php

class Tool {
	public $name;
	public $description;
	public $abilities = array ();


public function __construct ($name, $description, $abilities) {
	$this->name = $name;
	$this->description = $description;
	$this->abilities = $abilities;
}

	// Methods


}