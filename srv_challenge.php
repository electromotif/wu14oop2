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

// load player. 

$player = &$ds->player[0];

// Was prevoius challenge sent?

if (isset($_REQUEST["pre_chlng"]) && isset($_REQUEST["change"])) {
	$pre_chlng_idx = $_REQUEST["pre_chlng"];

    // if set, user requests a new random challenge. 
    // pick one differing from previous,
    // and decrease success points

	$rnd_chlng_idx = $pre_chlng_idx;
	
	// $player -> success minus 5 about here
	
	while ($rnd_chlng_idx == $pre_chlng_idx) {
	$rnd_chlng_idx = rand(0, count($ds->challenges)-1);
		};
	} 
	else {
	 	// new challenge differing from previous.
		while ($rnd_chlng_idx == $pre_chlng_idx) {
			$rnd_chlng_idx = rand(0, count($ds->challenges)-1);
		};
	};

//remove old challenge
unset($ds->crnt_chlng);

//add the new one
$ds->crnt_chlng[] = $ds->challenges[$rnd_chlng_idx];

$chlng = $ds->crnt_chlng[0];

//and echo it out
echo(json_encode(array("chlngName" => $chlng->name, "chlngDesc" => $chlng->description,
	"chlng_abilities" => $chlng->abilities)));






?>