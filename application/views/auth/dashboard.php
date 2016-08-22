<div class="row">
	
	<div class="large-12 small-12 columns" id="progress"></div>



	<div class="large-3 small-4 columns" id="profile_me">
		<label class="avatar" id="avatar_cient" title="Cambiar avatar" style="background-image:url('<?=base_url()?>assets/images/avatars/<?=$user_avatar;?>')" width="150px"> 
        	<input type=file accept="image/*" name="avatar" class="avatar">
     	 </label>
	</div>	

	<div class="large-3 small-8 columns">

		<ul class="no-bullet spacer">
			<li>#<?=$user_data[0]->id;?></li>
			<li><?=$user_data[0]->user_email;?></li>
			<li>Vencimiento: <?=date("d/m/Y",strtotime($user_data[0]->fecha_fin));?></li>
		</ul>

	</div>	

	<div class="large-6 small-12 columns">					
		<ul class="no-bullet menu smaller text-center">
			<li class="text-center">Parrilla<br> <span class="badge visit " id="parrilla"><?=$user_data[0]->ta_parrilla;?></span></li>
			<li class="text-center">Gascona<br> <span class="badge visit " id="gascona"><?=$user_data[0]->ta_gascona;?></span></li>
			<li class="text-center">Aviles<br> <span class="badge visit " id="aviles"><?=$user_data[0]->ta_aviles;?></span></li>
			<li class="text-center">Poniente<br> <span class="badge visit " id="poniente"><?=$user_data[0]->ta_poniente;?></span></li>
			<li class="text-center">Aguila<br> <span class="badge visit " id="aguila"><?=$user_data[0]->ta_aguila;?></span></li>
		</ul>
		<br>
		<h6 class="text-center"><strong><span>Visitas totales</span></strong> <span class="badge visit secondary" id="total"><?=$total;?></span></h6>

	<div class="close" id="logout">
		<a href="<?=base_url()?>auth/logout"><img src="<?=base_url()?>assets/images/exit.png" alt="Logout" /></a>			
	</div>

	</div>

</div> 

</div><!-- Cierre callout-->
</div><!-- Cierre 7 columns-->


<div id="boton_sellar" class="large-5 small-12 columns medium-4">

	<ul class="nav">
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



