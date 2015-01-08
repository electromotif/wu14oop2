<?php
		// CHALLENGES

		/* 

		4	4	7	5	
		4	4	8	6
		5	5	5	5
		8	7	5	8
		10	10	10	10
		4	4	3	6
		6	5	4	4
		7	6	6	6
		7	7	5	5
		5	8	7	5

		*/

//Nodebite black box
include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2"
));

//empty tools
$tools = &$ds->tools;

echo(json_encode($tools));

$ch1 = array (
	"ride" => 4,
	"plan" => 4,
	"endu" => 7,
	"impr" => 5,
);		
 
//

$ch2 = array (
	"ride" => 4,
	"plan" => 4,
	"endu" => 8,
	"impr" => 6,
);	

//

$ch3 = array (
	"ride" => 5,
	"plan" => 5,
	"endu" => 5,
	"impr" => 5,
);	

//

$ch4 = array (
	"ride" => 8,
	"plan" => 7,
	"endu" => 5,
	"impr" => 8,
);	

//

$ch5 = array (
	"ride" => 10,
	"plan" => 10,
	"endu" => 10,
	"impr" => 10,
);	

//

$ch6 = array (
	"ride" => 4,
	"plan" => 4,
	"endu" => 3,
	"impr" => 6,
);	

//

$ch7 = array (
	"ride" => 6,
	"plan" => 5,
	"endu" => 4,
	"impr" => 4,
);	

//

$ch8 = array (
	"ride" => 7,
	"plan" => 6,
	"endu" => 6,
	"impr" => 6,
);	

//

$ch9 = array (
	"ride" => 7,
	"plan" => 7,
	"endu" => 5,
	"impr" => 5,
);	

//

$ch10 = array (
	"ride" => 5,
	"plan" => 8,
	"endu" => 7,
	"impr" => 5,
);	








?>