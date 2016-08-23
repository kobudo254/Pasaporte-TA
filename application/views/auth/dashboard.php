<div class="row">
	
	<div class="large-12 small-12 columns" id="progress" data-step="1" data-intro="Bienvenido al pasaporte Tierra Astur, te explicaremos de que va esto." data-position="bottom"></div>

	<div class="large-3 small-4 columns" id="profile_me">
		<form enctype="multipart/form-data" accept-charset="utf-8" name="formname" id="formname"  method="post" action="">
			<img src='<?=base_url()?><?=$user_avatar;?>' id="img_avatar" class="avatar" data-step="2" data-intro="Este es tu avatar (por defecto), podrás cambiarlo haciendo click sobre la imagen."> 
        	<input type="file" accept="image/*" name="userfile" id="userfile" class="avatar"> 
        	<input type="hidden" value="<?=$user_data[0]->id;?>" id="user_id" name="user_id">     	 
     	 </form>
	</div>	

	<div class="large-3 small-8 columns"  data-step="3" data-intro="Estos son tus datos">

		<ul class="no-bullet spacer">
			<li>#<?=$user_data[0]->id;?></li>
			<li><?=$user_data[0]->user_email;?></li>
			<li>Vencimiento: <?=date("d/m/Y",strtotime($user_data[0]->fecha_fin));?></li>
		</ul>

	</div>	

	<div class="large-6 small-12 columns" class="close_me_please">					
		<ul class="no-bullet menu smaller text-center" data-step="4" data-intro="Aquí tienes detalladas cuántas visitas has realizado a cada sidrería"  data-position="bottom">
			<li class="text-center">Parrilla<br> <span class="badge visit " id="parrilla"><?=$user_data[0]->ta_parrilla;?></span></li>
			<li class="text-center">Gascona<br> <span class="badge visit " id="gascona"><?=$user_data[0]->ta_gascona;?></span></li>
			<li class="text-center">Aviles<br> <span class="badge visit " id="aviles"><?=$user_data[0]->ta_aviles;?></span></li>
			<li class="text-center">Poniente<br> <span class="badge visit " id="poniente"><?=$user_data[0]->ta_poniente;?></span></li>
			<li class="text-center">Aguila<br> <span class="badge visit " id="aguila"><?=$user_data[0]->ta_aguila;?></span></li>
		</ul>
		<br>
		<h6 class="text-center" data-step="6" data-intro="¡Cuando logres sellar 3, 6 y 10 visitas respectivamente, tendrás un premio directo! Además cuando tengas las 10, si has visitado todas las sidrerías Tierra Astur, te espera un premio muy especial..."  data-position="bottom">
			<strong><span>Visitas totales</span></strong> <span class="badge visit secondary" id="total"><?=$total;?></span>
		</h6>

	<div class="close" id="logout" data-step="7" data-intro="Cuando quieresa salir del pasaporte pulsa aquí"  data-position="left">
		<a href="<?=base_url()?>auth/logout"><img src="<?=base_url()?>assets/images/exit.png" alt="Logout" /></a>			
	</div>

	</div>

</div> 

</div><!-- Cierre callout-->
</div><!-- Cierre 7 columns-->

<div id="boton_sellar" class="large-5 small-12 columns medium-4">
	<ul class="nav" data-step="5" data-intro="Este botón te lleva al listado de sidrerías. Una vez ahí pide en caja que te sellen la visita :)"  data-position="top">
	    <li>
	  		<a href="#" id="mostrar_chigres">
	        	<span class="icon-ta"></span>
	        	<span class="screen-reader-text">SELLAR VISITA</span>
	      	</a>
	  	</li>
	</ul>
</div>


</div><!-- Cierre dashboard-->


<div id="botones_sidreria" class="large-12 small-12 columns">
	<div class="spaceball"></div>	
	<div class="row">
		<div class="large-4  medium-6 small-6 columns small-centered text-center">
			<ul class="no-bullet text-center">
				<li><a data-url="<?=base_url()?>passport/sello/gascona/<?=$user_data[0]->id;?>" data-chigre="gascona" class="button expanded sumachigre">Gascona</a></li>
				<li><a data-url="<?=base_url()?>passport/sello/parrilla/<?=$user_data[0]->id;?>" data-chigre="parrilla" class="button expanded sumachigre">Parrilla</a></li>
				<li><a data-url="<?=base_url()?>passport/sello/aguila/<?=$user_data[0]->id;?>" data-chigre="aguila" class="button expanded sumachigre">Aguila</a></li>
				<li><a data-url="<?=base_url()?>passport/sello/aviles/<?=$user_data[0]->id;?>" data-chigre="aviles" class="button expanded sumachigre">Aviles</a></li>
				<li><a data-url="<?=base_url()?>passport/sello/poniente/<?=$user_data[0]->id;?>" data-chigre="poniente" class="button expanded sumachigre">Poniente</a></li>
			</ul>
			<p class="text-center"><br>
			<a id="mostrar_dashboard" class="button medium"><i class="fi-arrow-left"></i> Volver</a>
			</p>
		</div>

	</div>
</div>