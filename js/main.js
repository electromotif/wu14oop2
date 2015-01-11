$("document").ready(function(){

// Hide bottom field

$('.btm').hide();

// Click handlers 

// grabs chosen type of player from buttons, hands it over to namePlayer.

	$('button.btn.plrClass').click(function(){
	    playerClass = $(this).val();
	    namePlayer (playerClass);
	});

// Go toChallenge button

	$('.mid').on('click', 'button.btn.toChallenge', function() {
  	challenge(); 
  	// and this is where this file 'ends', challenge lives in chlng.js

	});

	/* $('button.btn.toChallenge').click(function(){
		    console.log ("Click");
		    challenge ();
	}); */


// namePlayer displays the chosen type(class) of player and asks for a name.
// It grabs the name on submit of a form, then ajaxes playerName and 
// playerClass to startgame.php which creates a php object with the chosen
// class and name. 
//
// Upon success of the ajax call, createBots is run 

function namePlayer(playerClass) {
	
	$('.mid').hide();
	$('.btm').prepend(playerClass + ", what's your name?<br><br>");
	$('.btm').fadeTo('medium', 1);
	
	// #plrNmFrm is the id of the html form, #plrNm is id of field

	$("#plrNmFrm").submit(function() {

			// Grab value of plrNm

			playerName = ($("#plrNm").val());

			$.ajax({
			dataType: "json",
			url: "startgame.php", 
			data: {playerName: playerName, playerClass: playerClass},
			success: function(data) {
				createBots();
			}
		});
		
		// Return false, or the page reloads on form submit
		return false;
	});		
};
	// Simply triggers bots_tools_challenges.php
	function createBots () {

		$('.btm').hide();
	
		$.ajax({
				dataType: "json",
				url: "bots_tools_challenges.php", 
				data: {},
				success: function(data) {
					contenders (data);
				}
			});
		};

	function contenders (data) {

		$('.mid').html("<p>We have a rally! " + playerName + ", you are joined by:</p><br>");
		$('.mid').append("<p>- " + data.bot1_name + " -</p>" + data.bot1_class, 
			"<br><br><p>- " + data.bot2_name + " -</p>" + data.bot2_class + "<br><br>");
		$('.mid').append("<button class='btn toChallenge'>Get ready for the first section!</button>"); 
		$('.mid').fadeTo('slow', 1);
		};	

}); // DOM Ready end