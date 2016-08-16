/* App index javascript file */
$( document ).ready(function() {

	if($("#progressBar").length>0){
		progress(100, $('#progressBar'));
	}

});


function progress(percent, $element) {

    var progressBarWidth = percent * $element.width() / 100;
    $element.find('div').animate({ width: progressBarWidth }, 3000, function() {
    	$("#continuar").removeClass("hide");   
  });
}