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

//empty tools

unset($ds->tools);
$tools = &$ds->tools;

		// TOOLS

		// ride + plan : bästa kläderna, stövlar, hjälm + detaljerad karta

$rdgear_map = array (
	"ride" => 1.2,
	"plan" => 1.2,
	"endu" => 1,
	"impr" => 1,
);		

$tools[] = New Tool("rdgear_map", $rdgear_map);

		// ride + endu : stabilizer och elektronisk fjädringsjustering	

$stab_susp = array (
	"ride" => 1.2,
	"plan" => 1,
	"endu" => 1.2,
	"impr" => 1,
);		

$tools[] = New Tool("stab_susp", $stab_susp);

		// ride + impr : ny hoj (höjer impr då man inte behöver meka)

$nbike = array (
	"ride" => 1.2,
	"plan" => 1,
	"endu" => 1,
	"impr" => 1.2,
);	
$tools[] = New Tool("nbike", $nbike);

		// plan + endu : shakedown ride (endu då man kan undvika dåliga rutter)

$shkdwnride = array (
	"ride" => 1,
	"plan" => 1.2,
	"endu" => 1.2,
	"impr" => 1,
);	
$tools[] = New Tool("shkdwnride", $shkdwnride);

		// plan + impr : supergps (impr då man 'ser' alternativa rutter)

$supernav = array (
	"ride" => 1,
	"plan" => 1.2,
	"endu" => 1,
	"impr" => 1.2,
);	
$tools[] = New Tool("supernav", $supernav);

		// impr + endu : (arga djur, byteshandel, äta själv) 

$dlxfood  = array (
	"ride" => 1,
	"plan" => 1,
	"endu" => 1.2,
	"impr" => 1.2,
);	
	$tools[] = New Tool("dlxfood", $dlxfood);

		// supporttruck	(bingo! allihop * 1.2)

$suptruck  = array (
	"ride" => 1.2,
	"plan" => 1.2,
	"endu" => 1.2,
	"impr" => 1.2,
);		 
$tools[] = New Tool("suptruck", $suptruck);

		// supportbike (liten bingo)

$supbike  = array (
	"ride" => 1.1,
	"plan" => 1.1,
	"endu" => 1.1,
	"impr" => 1.1,
);		 

$tools[] = New Tool("supbike", $supbike);
echo "<br><br>";
var_dump ($stab_susp);







?>