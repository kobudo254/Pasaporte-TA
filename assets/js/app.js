/* App index javascript file */
$( document ).ready(function() {

	if($("#progressBar").length>0){
		progress(100, $('#progressBar'));
	}


	//Ajax call to count and add one visit
	$(".sumachigre").click(function(event) {
		event.preventDefault();
		event.stopPropagation(); 

		var url_sello = $(this).attr('data-url');
		var chigre = $(this).attr('data-chigre');

		//Input pidiendo clave
		var clave_chigre = prompt("CAJERA: Introduzca clave centro TA "+chigre);
		if (clave_chigre != null) {
			 $.ajax({
			     type: 'POST',
			     url: 'pass_check/'+chigre+'/', 
			     data: {'clave_chigre': clave_chigre}, //se manda la clave introducida por post
			     dataType: 'text',  
			     cache:false,
			        success: function(data){
			          console.log(data);
			          	if(data === "true"){
			          		sellame(url_sello);			          	
			      		}else{
							alert("Contraseña incorrecta");
			      		}
			        },
			        error: function (data) {		      	
			        console.log(data);
			        alert("Contraseña incorrecta");
			      }
		    });
		}else{
			return false;			
		}

	});


//Callbacks
function progress(percent, $element) {

    var progressBarWidth = percent * $element.width() / 100;
    $element.find('div').animate({ width: progressBarWidth }, 3000, function() {
    	$("#continuar").removeClass("hide");   
  });
}


function sellame(url_sello){
 $.ajax({
     type: 'POST',
     url: url_sello, 
     data: {'sello': true},
     dataType: 'json',  
     cache:false,
        success: function(data){
          //console.log(data);
          $("span#parrilla").text(data.user_data[0].ta_parrilla);
          $("span#gascona").text(data.user_data[0].ta_gascona);
          $("span#aviles").text(data.user_data[0].ta_aviles);
          $("span#poniente").text(data.user_data[0].ta_poniente);
          $("span#aguila").text(data.user_data[0].ta_aguila);
          $("span#total").text(data.total);

        },
      error: function (data) {
        console.log(data);
      }
	});
}//Fin sellame

});





