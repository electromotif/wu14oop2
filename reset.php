<?php


include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "character_db",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "characters_trial"
));

// if there is a request to reset the file

if (isset($_REQUEST["reset"])) {

// unset monsters and heroes from $ds
//	unset($ds->monsters);
//	unset($ds->heroes);

}