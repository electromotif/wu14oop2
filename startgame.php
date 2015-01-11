<?php

	//Nodebite black box

include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2"
));

	//empty all properties in use

unset($ds->player);
unset($ds->bots);
unset($ds->challenges);
unset($ds->tools);

	// Check if Name and Class of player is sent
	// If so, set Name and Class of player

if (isset($_REQUEST["playerName"]) && isset($_REQUEST["playerClass"])) {
	$playerName = $_REQUEST["playerName"];
	$playerClass = $_REQUEST["playerClass"];
	} 
	else {

	// Provides (debugging) bounce for ajax call and graceful exit if the above is not met
	
	echo(json_encode(false));
	exit();
}
	// Create new player and tie it to DBOS

$ds->player[] = New $playerClass($playerName);

	// Assign player in DBOS to a neat variable

$player = &$ds->player[0];

	// return player name and class to ajax

echo(json_encode(array("name" => $player->name, "class" => get_class($player))));











