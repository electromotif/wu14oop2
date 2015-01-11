	function challenge () {
		console.log ("Challenge function");
		$('.top').hide();
		$('.mid').hide();
		$('.btm').hide();
		$('.top').css("background-image", "url(img/ktms.jpg)");  
		$('.top').fadeTo('slow', 1);
		
		$.ajax({
			dataType: "json",
			url: "srv_challenge.php", 
			data: {pre_chlng: "", change_chlng: ""},
			success: function(data) {
				console.log ("Ajax away");
				console.log (data);
				serveChallenge(data);
				}
			});
		};

	function serveChallenge (data) {
		$('.mid').css("text-align", "left")
		$('.mid').html("");
		$('.mid').append("<p>Next stop: " + data.chlngName + "</p><br><br>" +
			data.chlngDesc + "<br><br>" + 
			"The ratings for this challenge: <br>" + 
			"Riding -  " + data.chlng_abilities.ride + "<br>" +
			"Planning - " + data.chlng_abilities.plan + "<br>" +
			"Endurance - " + data.chlng_abilities.endu + "<br>" +
			"Maintenance & improvisation - " + data.chlng_abilities.impr);
		$('.btm').html("");
		$('.mid, .btm').fadeTo('slow', 1);

	};

