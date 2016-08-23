/* App index javascript file */
$( document ).ready(function() {

var localhost = $("html").attr('data-base-url');
//console.log(localhost);

	if($("#progressBar").length>0){
		progress(100, $('#progressBar'));
	}

	if($("#mydashboard a#mostrar_chigres").length>0){
		$('#mydashboard').removeClass( "my_dashboard" );
		$('#mydashboard').addClass( "my_dashboard_top" );
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
					     url: localhost+'auth/pass_check/'+chigre+'/', 
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

          /*Visita correcta y sellada, preguntamos si hay premio, y recogemos mensaje*/
          update_logro(data.total,data.user_data[0].id);
          	
        },
      error: function (data) {
        console.log(data);
      }
	});
}//Fin sellame



function update_logro(totales,user_id){

	var	premio = false;

	if(totales<10){

	 	$.ajax({
	     type: 'POST',
	     url: localhost+'passport/check_total/'+user_id, 
	     data: {'total_visitas': totales},
	     dataType: 'json',  
	     cache:false,
	        success: function(data){
	        	 /*Visita correcta y sellada, preguntamos si hay premio, y recogemos mensaje*/
	      		//console.log(data.msg);
				jAlert(data.msg, 'VISITA REGISTRADA CORRECTAMENTE', function(){
					$( "a#mostrar_dashboard" ).click(); //Bye bye botones

				});
				//console.log(data.premio)
				if(data.premio == true){
					console.log("Enviando mail.");
				 	$.ajax({
				     type: 'POST',
				     url: localhost+'passport/mailing_me/', 
				     data: {'correo': true},
				     dataType: 'json',  
				     cache:false,
				        success: function(data){
			 				console.log(data);
				        },
				      error: function (data) {
				        	console.log(data);
				      }
					});
				}
	        },
	      error: function (data) {
	        console.log(data);
	      }
		});

	}else{ 

		//Revisar si es deluxe
		cuentas_chigre = [
			$("span#parrilla").text(),
			$("span#gascona").text(),
			$("span#aviles").text(),
			$("span#poniente").text(),
			$("span#aguila").text()
		];

		var deluxe="";

		if(jQuery.inArray( "0", cuentas_chigre ) == -1) {
			//DELUXE!! Todos los chigres sellados
			deluxe = "/deluxe";
		}

		//console.log("Enviando mail.");
		//Mailing
	 	$.ajax({
	     type: 'POST',
	     url: localhost+'passport/mailing_me/', 
	     data: {'correo': true},
	     dataType: 'json',  
	     cache:false,
	        success: function(data){
 				console.log(data);
	        },
	      error: function (data) {
	        	console.log(data);
	      }
		});


		window.location.replace(localhost+"passport/fin/"+user_id+deluxe);	

	}

}//Fin update

	//Cambiar avatar
	/* read url from input files */
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        
	        reader.onload = function (e) {
	            url="'"+e.target.result+"'";
	            element = $("img#img_avatar");
	            element.attr("src", url); 
	            console.log(element);
	        }	        
	        reader.readAsDataURL(input.files[0]);
	    }

	}



	function do_upload(input) {
		var fd = new FormData();    
		fd.append( 'userfile', input.files[0] );

		$.ajax({
		  url: localhost+"auth/avatar/",
		  data: fd,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  success: function(imagen){
		    //console.log(imagen);
		    if(imagen != null){
		    	$("img#img_avatar").remove();
				var img = $('<img id="img_avatar" src='+imagen+' />'); 
				img.appendTo('#profile_me form');
		    }
		  }
		});

		return true;
	};

	$("img#img_avatar").on( "click", function() {
		$("input.avatar").click();
	});

	 $("input.avatar").change(function(){
	  	do_upload(this);
	   	//readURL(this);
	});


});





