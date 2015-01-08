<?php
//Nodebite black box
include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "character_db",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "characters_trial"
));

//hugos version of healthCheck
//that can be used on a single character only
function healthCheck($character){
 echo('<br><br>');
  echo($character->isAlive() ? $character->name." is alive.<br>" : $character->name." is dead.<br>");
  echo($character->name." health: ".$character->health.'<br>'); 
} 

// to use the ds class we will need to do the following 

// first of all I need to check if there are any monsters
// and/or heroes saved

// we do this with isset()
// did we load any monsters from db?

if  (!isset($ds->monsters)) {
  // if not lets create a new property
  // to track our monsters with
  $ds->monsters = array ();
}

if  (!isset($ds->heroes)) {
  // if not lets create a new property
  // to track our heroes with
  $ds->heroes = array ();
}

echo ("<br>Did we load a monster or should we make one?");
// if not:
if (!count($ds->monsters)) {
  // create new monster
  echo ("<br> created monster");
$hugo = new Monster("Hugo");

//track monster
$ds->monsters[] = $hugo;
}

//if we did load a monster
else {
  $hugo = &$ds->monsters[0];
}

echo ("<br> DS monsters<br>");
var_dump($ds->monsters);

echo ("<br>Did we load a hero or should we make one?<br>");
// if not:
if (!count($ds->heroes)) {
  // create new heroes
  echo ("<br> created hero<br>");
$susanne = new Hero("Susanne");
//track hero
$ds->heroes[] = $susanne;
}

//if we did load a hero
else {
  $susanne = &$ds->heroes[0];
}

echo ("<br> DS heroes<br>");
var_dump($ds->heroes);

$hugos_weapon = new Weapon($hugo);
$susanne_weapon = new Weapon($susanne);




healthCheck($susanne);
echo ($hugo->attack($susanne));
healthCheck($susanne);






?>