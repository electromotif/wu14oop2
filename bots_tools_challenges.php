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

// Begin create bots..
// Randomize name of Bots. This. should. be. done. with. LOOPS! I'll work it out eventually.

$btnmpt1 = array ("Meck", "Punk", "Trix", "Tok", "Svett", "Vurp");
$btnmpt2 = array ("bert", "helvetius", "zina", "amaxos", "atore", "oslav");

$part1 = rand(0,5);
$part2 = rand(0,5);

while ($part1==$part2){
	$part2 = rand(0,5);
};

$bot1_fname = ($btnmpt1[$part1].$btnmpt2[$part2]);

unset($btnmpt1[$part1]);
unset($btnmpt2[$part2]);
// (Array_values to re-index the arrays because unset keeps the indexes)
$btnmpt1 = array_values($btnmpt1);
$btnmpt2 = array_values($btnmpt2);

$part1 = rand(0,4);
$part2 = rand(0,4);

while ($part1==$part2){
	$part2 = rand(0,4);
};

$bot1_lname = ($btnmpt1[$part1].$btnmpt2[$part2]);

unset($btnmpt1[$part1]);
unset($btnmpt2[$part2]);
$btnmpt1 = array_values($btnmpt1);
$btnmpt2 = array_values($btnmpt2);

// Bot 2

$part1 = rand(0,3);
$part2 = rand(0,3);

while ($part1==$part2){
	$part2 = rand(0,3);
};

$bot2_fname = ($btnmpt1[$part1].$btnmpt2[$part2]);

unset($btnmpt1[$part1]);
unset($btnmpt2[$part2]);
$btnmpt1 = array_values($btnmpt1);
$btnmpt2 = array_values($btnmpt2);

$part1 = rand(0,2);
$part2 = rand(0,2);

while ($part1==$part2){
	$part2 = rand(0,2);
};

$bot2_lname = ($btnmpt1[$part1].$btnmpt2[$part2]);

// Finally, finished and unique names.

$bot1_name = $bot1_fname." ".$bot1_lname;
$bot2_name = $bot2_fname." ".$bot2_lname;

// Randomize classes
// an array with all types/classes of players

$class_names = array(
	"Rider",
	"Planner",
	"Endurer",
	"Improviser",
	"Allrounder",
);
// Read player's class from DSOB, put it in variable 

$player_class = get_class($ds->player[0]);

// Begin randomize first bot: 

$bot1_class = $player_class;

while ($bot1_class==$player_class){
	$rndidx = rand(0,count($class_names)-1);
	$bot1_class = $class_names[$rndidx];
};

// When bot1_class differs from player_class, the while loop exits
// leaving a differing class in bot1_class, 
// lets create a bot of that class and hook it up to DSOB.

$ds->bots[]=New $bot1_class($bot1_name);

// Randomize second bot

$bot2_class = $bot1_class;

// extended while condition to make sure bot2_class differs from bot1_class

while ($bot2_class==$player_class || $bot2_class == $bot1_class){
	$rndidx = rand(0,count($class_names)-1);
	$bot2_class = $class_names[$rndidx];
};

$ds->bots[]=New $bot2_class($bot2_name);


// Bots done. Great.

// Go for Tools!

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
$tool_names = array("Ridegear & map", "Stabilizer & electronic suspension", "New bike", "Shakedownride",
	"Supernav", "Deluxe food", "Supportruck", "Supportbike");
$tool_descriptions = array ("This includes the best (heated) clothing, boots and helmet money can buy, 
	and a map with every critical detail.", "Steering stabilizer and electronically adjustable suspension.",
	"This is a new bike; broken-in, tweaked and ready to ride.", "You are given fuel and permission for a shakedown-ride.",
	"The super-nav kit contains gps and electronic roadbook, all on head-up display. ",
	"Adventureworthy treats - to eat, use in bargaining or to distract animals",
	"Bingo, adventurer. You got a supporttruck!",
	"Good news! A supportbike will follow your tracks.");


// create empty array that randomized tools are added to

$created_tools = array();

// loop that randomizes 9 tools with max 2 of each kind

while (count($created_tools) < 9){
	$rndidx = rand(0,count($tool_options)-1);
	$tool_name = $tool_names[$rndidx];
	$tool_description = $tool_descriptions[$rndidx];
	$random_tool = $tool_options[$rndidx];


	// is there less than 2 of the currently randomized tool in our array?
	if (count_occurences($random_tool, $created_tools) < 2) {
	
	// if so, push it to array
		$created_tools[] = $random_tool;
		$ds->tools[] = new Tool($tool_name, $tool_description, $random_tool);
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

$challenge_options = array($ch1, $ch2, $ch3, $ch4, $ch5, $ch6, $ch7, $ch8, $ch9, $ch10);

$challenge_names = array(
	"Hakatzoe.", "Mochia.", "Ochiticzla.", "Uhikanka.", "Molotovina.", "Holier than thou.", "Ksinromba.",
	"Ughdibembo.", "Sweden.", "Tierra del Fuego.");
	
$challenge_descriptions = array (
	"This route follows the river Hakatzoe. An easy straight ride, but requires some endurance.",
	"You're gonna ride the classic Jumpalooza route circling the Mochia plateau. It's the altitude that kills you.",
	"Monkeys high on leftover energydrinks dominate the jungle between three villages in Ochiticzla. A relatively mellow stretch but not without suprises.",
	"THE favourite of technical riders. Lots of difficult passages in the Uhikanka mountains.",
	"This will require everything you got. 800 kilometers of unrelenting Molotovina wilderness.",
	"666 turns around Kristi lekamen is not a problem. Say hi to those horsemen, peculiar chaps, listening to vinyl backwards.",
	"A beatiful route at the foot of Ksinromba, with a few challenging river crossings.",
	"The route along the rocky coast of Ughdibembo usually involves a stop for whale-spotting.",
	"This section of the dense forests of northern Sweden will have you camping with wolves and boars. Lucky you.",
	"This one makes most riders homesick. Our route in Tierra del Fuego is a savage beauty. Plan ahead.");

for ($i=0; $i < 10; $i++) { 
	$ds->challenges[] = new Challenge($challenge_names[$i],$challenge_descriptions[$i],$challenge_options[$i]);
};

echo(json_encode(array("bot1_name" => $bot1_name, "bot1_class" => $bot1_class, "bot2_name" => $bot2_name, "bot2_class" => $bot2_class)));

?>
