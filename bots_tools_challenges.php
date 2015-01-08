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

unset($ds->bots);
unset($ds->challenges);
unset($ds->tools);

//  Begin create bots. First an array with all types/classes of players

$class_names = array(
	"Rider",
	"Planner",
	"Endurer",
	"Improviser",
	"Allrounder",
);
// Read player's class from DSOB, put it in variable 

$player_class = get_class($ds->player[0]);

// Begin randomize first bot. 

$random_class = $player_class;

while ($random_class==$player_class){
	$rndidx = rand(0,count($class_names)-1);
	$random_class = $class_names[$rndidx];
};
// When random_class differs from player_class, the while loop exits
// leaving a differing class in random_class, 
// lets create a bot of that class and hook it up to DSOB.

$ds->bots[]=New $random_class("Bot1");

// Randomize second bot

$random_class2 = $random_class;

// Note extended while condition to make sure bot2 differs from bot1

while ($random_class==$player_class || $random_class2 == $random_class){
	$rndidx = rand(0,count($class_names)-1);
	$random_class2 = $class_names[$rndidx];
};

$ds->bots[]=New $random_class2("Bot2");

echo "<br>player:<br>";
var_dump ($ds->player);
echo "<br><br>bot1:<br>";
var_dump ($ds->bots[0]);
echo "<br><br>";
echo "<br>bot2:<br>";
var_dump ($ds->bots[1]);

// Bots done

// Tools!

	// TOOLS 'library'

		// ride + plan : bästa kläderna, stövlar, hjälm + detaljerad karta

$rdgear_map = array ("ride" => 1.2, "plan" => 1.2, "endu" => 1, "impr" => 1,);		

		// ride + endu : stabilizer och elektronisk fjädringsjustering	

$stab_susp = array ("ride" => 1.2, "plan" => 1, "endu" => 1.2, "impr" => 1,);		

		// ride + impr : ny hoj (höjer impr då man inte behöver meka)

$nbike = array ("ride" => 1.2, "plan" => 1, "endu" => 1, "impr" => 1.2,);	

		// plan + endu : shakedown ride (endu då man kan undvika dåliga rutter)

$shkdwnride = array ("ride" => 1, "plan" => 1.2, "endu" => 1.2, "impr" => 1,);	

		// plan + impr : supergps (impr då man 'ser' alternativa rutter)

$supernav = array ("ride" => 1, "plan" => 1.2, "endu" => 1, "impr" => 1.2,);	

		// impr + endu : (arga djur, byteshandel, äta själv) 

$dlxfood  = array ("ride" => 1, "plan" => 1, "endu" => 1.2, "impr" => 1.2,);	
	
		// supporttruck	(bingo! allihop * 1.2)

$suptruck  = array ("ride" => 1.2, "plan" => 1.2, "endu" => 1.2, "impr" => 1.2,);		 

		// supportbike (liten bingo)

$supbike  = array ("ride" => 1.1, "plan" => 1.1, "endu" => 1.1, "impr" => 1.1,);		 

// Begin randomize 9 tools

// function to count occurences in one-dimensional array

function count_occurences($value, $array) {
	$count = 0;
	for ($i=0; $i < count($array); $i++) { 
		if ($array[$i] === $value) {
			$count++;
		}
	}
	return $count;
}

// here we go - create an array of all (possible) tools 

$tool_options = array($rdgear_map, $stab_susp, $nbike, $shkdwnride, $supernav, $dlxfood, $suptruck, $supbike);

// create empty array that randomized tools are added to

$created_tools = array();

// loop that randomizes 9 tools with max 2 of each kind

while (count($created_tools) < 9){
	$rndidx = rand(0,count($tool_options)-1);
	$random_tool = $tool_options[$rndidx];
	
	// is there less than 2 of the currently randomized tool in our array?
	
	if (count_occurences($random_tool, $created_tools) < 2) {
	
	// if so, push it to array

		$created_tools[] = $random_tool;
		$ds->tools[] = new Tool($random_tool);
	}
};

// echo("<br><br>");
// var_dump(count_occurences($nbike, $tool_options));
// echo("<br><br>");

	// Tools done.

	// CHALLENGES 'library'

$ch1 = array ("ride" => 4, "plan" => 4, "endu" => 7, "impr" => 5,);		
 
$ch2 = array ("ride" => 4, "plan" => 4, "endu" => 8, "impr" => 6,);	

$ch3 = array ("ride" => 5, "plan" => 5, "endu" => 5, "impr" => 5,);	

$ch4 = array ("ride" => 8, "plan" => 7, "endu" => 5, "impr" => 8,);	

$ch5 = array ("ride" => 10, "plan" => 10, "endu" => 10, "impr" => 10,);	

$ch6 = array ("ride" => 4, "plan" => 4, "endu" => 3, "impr" => 6,);	

$ch7 = array ("ride" => 6, "plan" => 5, "endu" => 4, "impr" => 4,);	

$ch8 = array ("ride" => 7, "plan" => 6, "endu" => 6, "impr" => 6,);	

$ch9 = array ("ride" => 7, "plan" => 7, "endu" => 5, "impr" => 5,);	

$ch10 = array ("ride" => 5, "plan" => 8, "endu" => 7, "impr" => 5,);




	// Dumps and stuff for dev

//$ds->challenges[] = new ...
/* 
$ch_one = new Challenge ($ch_one, $ch1);
$ch_two = new Challenge ($ch_two, $ch2);
$ch_three = new Challenge ($ch_three, $ch3);
$ch_four = new Challenge ($ch_four, $ch4);
*/


/*
echo "<br><br>";
var_dump ($ch_one);
echo "<br><br>";
var_dump ($ch_two);
echo "<br><br>";
var_dump ($ch_three);
echo "<br><br>";
var_dump ($ch_four);
echo "<br><br>";
var_dump ($rg_mp);
echo "<br><br>";
var_dump ($st_su);
echo "<br><br>";
var_dump ($ne_bi);
echo "<br><br>";
var_dump ($sh_ri);
echo "<br><br>";
var_dump ($su_na);
echo "<br><br>";
var_dump ($dl_fo);
echo "<br><br>";
var_dump ($su_tr);
echo "<br><br>";
var_dump ($su_bi);
echo "<br><br>";
*/

/* 
$rg_mp = new Tool ($rdgear_map, $rdgear_map);
$st_su = new Tool ($stab_susp, $stab_susp);
$ne_bi = new Tool ($nbike, $nbike);
$sh_ri = new Tool ($shkdwnride, $shkdwnride);
$su_na = new Tool ($supernav, $supernav);
$dl_fo = new Tool ($dlxfood, $dlxfood);
$su_tr = new Tool ($suptruck, $suptruck);
$su_bi = new Tool ($supbike, $supbike);
*/

?>

