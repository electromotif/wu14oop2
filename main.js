$("document").ready(function(){

console.log ("blah");

	$.ajax({
		type: "POST",
		dataType: "json",
		url: "startgame.php", 
		data: {"playerName": "lila", "playerClass": "Endurer"},
		success: function(data) {
			console.log (data);
		}
	});
/*
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "jaxi.php", 
		// data: "data",
		success: function(data) {
			console.log (data);
		}
	});
*/

}); 