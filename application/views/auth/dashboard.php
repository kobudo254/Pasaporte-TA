
<div class="my_dashboard small-12 columns">
	
	<div class="large-7 large-centered columns">

		<div class="callout primary">

			<div class="row">

				<div class="large-3 small-4 columns">
					<img src="<?=base_url()?>assets/images/_user_avatar.png" alt="Yo" width="150px" style="border:1px solid #333;border-radius:5px;background:#e2e2e2" />
				</div>	

				<div class="large-4 small-8 columns">

					<ul class="no-bullet spacer">
						<li>#<?=$user_data[0]->id;?></li>
						<li><?=$user_data[0]->user_email;?></li>
						<li>Vencimiento: <?=date("d/m/Y",strtotime($user_data[0]->fecha_fin));?></li>
					</ul>

				</div>	

				<div class="large-5 small-12 columns">					
					<ul class="no-bullet menu smaller text-center">
						<li class="text-center">Parrilla<br> <span class="badge visit " id="parrilla"><?=$user_data[0]->ta_parrilla;?></span></li>
						<li class="text-center">Gascona<br> <span class="badge visit " id="gascona"><?=$user_data[0]->ta_gascona;?></span></li>
						<li class="text-center">Aviles<br> <span class="badge visit " id="aviles"><?=$user_data[0]->ta_aviles;?></span></li>
						<li class="text-center">Poniente<br> <span class="badge visit " id="poniente"><?=$user_data[0]->ta_poniente;?></span></li>
						<li class="text-center">Aguila<br> <span class="badge visit " id="aguila"><?=$user_data[0]->ta_aguila;?></span></li>
					</ul>
					<hr>
					<h6 class="text-center"><strong><span>Visitas Tierra Astur</span></strong> <span class="badge visit secondary" id="total"><?=$total;?></span></h6>

				<div class="close" id="logout">
					<a href="<?=base_url()?>auth/logout"><img src="<?=base_url()?>assets/images/exit.png" alt="Logout" /></a>			
				</div>

				</div>

			</div>

		</div>

	</div>

	<div class="large-12 columns">
	<div class="spaceball"></div>	
	<div class="row">
	<div class="large-12  small-6 columns small-centered text-center">
		<ul class="no-bullet text-center">
			<li><a data-url="<?=base_url()?>passport/sello/gascona/<?=$user_data[0]->id;?>" data-chigre="gascona" class="button expanded sumachigre">sellar gascona</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/parrilla/<?=$user_data[0]->id;?>" data-chigre="parrilla" class="button expanded sumachigre">sellar parrilla</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/aguila/<?=$user_data[0]->id;?>" data-chigre="aguila" class="button expanded sumachigre">sellar aguila</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/aviles/<?=$user_data[0]->id;?>" data-chigre="aviles" class="button expanded sumachigre">sellar aviles</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/poniente/<?=$user_data[0]->id;?>" data-chigre="poniente" class="button expanded sumachigre">sellar poniente</a></li>
		</ul>
	</div>
	</div>
	</div>

</div>