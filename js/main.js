$("document").ready(function(){

// Hide bottom field

$('.btm').hide();

// Click handler - grabs chosen type of player from buttons.
// Hands it over to namePlayer via thisBtnValue

	$('button.btn.plrClass').click(function(){
	    var thisBtnValue = $(this).val();
	    namePlayer (thisBtnValue);
	});

// namePlayer displays the chosen type(class) of player and asks for a name.
// It grabs the name on submit of a form, then ajaxes playerName and 
// playerClass to startgame.php which creates a php object with the chosen
// class and name. 
//
// Upon success of the ajax call, createBots is run with  the player 
// class and name as arguments. (bot types will be different from
// the player's type)

function namePlayer(thisBtnValue) {
	
	$('.mid').hide();
	$('.btm').prepend(thisBtnValue + ", what is your name?<br><br>");
	$('.btm').fadeTo('medium', 1);
	
	// #plrNmFrm is the id of the html form, #plrNm is id of field

	$("#plrNmFrm").submit(function() {

			// Grab value of plrNm

			playerName = ($("#plrNm").val());

			$.ajax({
			dataType: "json",
			url: "startgame.php", 
			data: {playerName: playerName, playerClass: thisBtnValue},
			success: function(data) {
				createBots(thisBtnValue);
			}
		});
		
		// Return false, or the page reloads on form submit
		return false;
	});		
};

function createBots (humanPlr) {
	$('.btm').hide();
	$('.mid').html(humanPlr);
	$('.mid').fadeTo('medium', 1)
};


	

}); // DOM Ready end