$("document").ready(function(){

// Hide bottom field

$('.btm').hide();

// Click handler, grabs chosen type of player from buttons.

	$('button.btn.plrClass').click(function(){
	    var thisBtnValue = $(this).val();
	    namePlayer (thisBtnValue);
	});

function namePlayer(thisBtnValue) {
	
	$('.mid').hide();
	$('.btm').prepend(thisBtnValue + ", what is your name?<br><br>");
	$('.btm').fadeTo('medium', 1);
	
	$("#plrNmFrm").submit(function() {

			// Grab value of plrNm

			playerName = ($("#plrNm").val());

			$.ajax({
			// type: "POST",
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