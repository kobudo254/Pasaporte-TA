/* App index javascript file */
$( document ).ready(function() {

	if($("#progressBar").length>0){
		progress(100, $('#progressBar'));
	}


	//Ajax call to count and add one visit
	$(".sumachigre").click(function(event) {
		event.preventDefault();
		event.stopPropagation(); 
		var url_sello = $( this).attr('data-url');
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
	});

});


function progress(percent, $element) {

    var progressBarWidth = percent * $element.width() / 100;
    $element.find('div').animate({ width: progressBarWidth }, 3000, function() {
    	$("#continuar").removeClass("hide");   
  });
}


