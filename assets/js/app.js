/* App index javascript file */
$( document ).ready(function() {

	if($("#progressBar").length>0){
		progress(100, $('#progressBar'));
	}

  
	  $( "a#mostrar_chigres" ).on( "click", function() {
	      var elem = $('#mydashboard');
	      var animationClass = "slide-out-left";
	      var eleme = $('#botones_sidreria');
	      var animationeClass = "slide-in-right";

	      Foundation.Motion.animateOut(elem, animationClass,function(){
	        Foundation.Motion.animateIn(eleme, animationeClass);
	      });
	  });


	  $( "a#mostrar_dashboard" ).on( "click", function() {
	      var elem = $('#mydashboard');
	      var animationClass = "slide-in-left";

	      var eleme = $('#botones_sidreria');
	      var animationeClass = "slide-out-right";

	      Foundation.Motion.animateOut(eleme, animationeClass,function(){
	        Foundation.Motion.animateIn(elem, animationClass);
	      });
	  });

	//Ajax call to count and add one visit
	$(".sumachigre").click(function(event) {
		event.preventDefault();
		event.stopPropagation(); 

		var url_sello = $(this).attr('data-url');
		var chigre = $(this).attr('data-chigre');
		var clave_chigre = null;

		//Input pidiendo clave
		//var clave_chigre = prompt("CAJERA: Introduzca clave centro TA "+chigre);
		jPrompt('Clave sidrería '+chigre, '', 'Instrucciones cajera', function(r) {
		    if( r ){
		    	clave_chigre = r;		    	
				if (clave_chigre != null && clave_chigre != "" ) {
					 $.ajax({
					     type: 'POST',
					     url: 'pass_check/'+chigre+'/', 
					     data: {'clave_chigre': clave_chigre}, //se manda la clave introducida por post
					     dataType: 'text',  
					     cache:false,
					        success: function(data){
					          //console.log(data);
					          	if(data == "true"){
					          		sellame(url_sello);			          	
					      		}else{
									jAlert('Contraseña incorrecta', 'Error...');
									clave_chigre = null;
					      		}
					        },
					        error: function (data) {		      	
					        //console.log(data);
					        jAlert('Contraseña incorrecta', 'Error...');
					        clave_chigre = null;
					      }
				    });
				}else{
					clave_chigre = null;
					jAlert('Contraseña incorrecta', 'Error...');
					return false;		
				}

		    }else{
				jAlert('La contraseña no puede estar vacía', 'Info');
				return false;			    	
		    }

		});//Fin prompt

	}); // Fin suma chigre

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
			jAlert('¡Visita registrada! Gracias', 'VISITA', function(){
				$( "a#mostrar_dashboard" ).click(); //Bye bye botones
			});
        },
      error: function (data) {
        console.log(data);
      }
	});
}//Fin sellame

});





