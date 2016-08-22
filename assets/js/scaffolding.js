//Pass protect
// self executing function here
(function() {
	var response = prompt("CLAVE ADMIN:");
	if(response != "crivencar2016"){
		alert("Clave erronea. Bye bye.");
		window.location.replace("http://www.tierra-astur.es");
	}	

})();
