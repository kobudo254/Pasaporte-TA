//Pass protect
// self executing function here
(function() {


	if(document.cookie.indexOf("visited") < 0) {

		var response = prompt("CLAVE ADMIN:");
		if(response != "crivencar2016"){
			alert("Clave erronea. Bye bye.");
			window.location.replace("http://www.tierra-astur.es");
		}else{

			  // Date()'s toGMTSting() method will format the date correctly for a cookie
			  document.cookie = "visited=true; max-age=" + 60 * 60 * 24 * 10; // 60 seconds to a minute, 60 minutes to an hour, 24 hours to a day, and 10 days.
		}

	}


})();
