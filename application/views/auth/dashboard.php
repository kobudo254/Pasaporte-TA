
<div class="my_dashboard small-12 columns">
	
	<div class="large-7 large-centered columns">

		<div class="callout primary">

			<div class="row">

				<div class="large-3 small-5 columns">
					<img src="<?=base_url()?>assets/images/_user_avatar.png" alt="Yo" width="150px" style="border:1px solid #333;border-radius:5px;background:#e2e2e2" />
				</div>	

				<div class="large-4 small-7 columns">

					<ul class="no-bullet spacer">
						<li>#<?=$user_data[0]->id;?></li>
						<li><?=$user_data[0]->user_email;?></li>
						<li>Vencimiento: <?=date("d/m/Y",strtotime($user_data[0]->fecha_fin));?></li>
					</ul>

				</div>	

				<div class="large-5 small-12 columns">
					<br class="show-for-small-only">
					<ul class="no-bullet smaller">
						<li>TA Parrilla: <span class="badge secondary " id="parrilla"><?=$user_data[0]->ta_parrilla;?></span> visitas</li>
						<li>TA Gascona: <span class="badge secondary " id="gascona"><?=$user_data[0]->ta_gascona;?></span> visitas</li>
						<li>TA Aviles: <span class="badge secondary " id="aviles"><?=$user_data[0]->ta_aviles;?></span> visitas</li>
						<li>TA Poniente: <span class="badge secondary " id="poniente"><?=$user_data[0]->ta_poniente;?></span> visitas</li>
						<li>TA Aguila: <span class="badge secondary " id="aguila"><?=$user_data[0]->ta_aguila;?></span> visitas</li>
					</ul>

					<h6><strong>Visitas Tierra Astur:</strong> <span class="badge secondary " id="total"><?=$total;?></span></h6>

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
			<li><a data-url="<?=base_url()?>passport/sello/gascona/<?=$user_data[0]->id;?>" class="button expanded sumachigre">sellar gascona</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/parrilla/<?=$user_data[0]->id;?>" class="button expanded sumachigre">sellar parrilla</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/aguila/<?=$user_data[0]->id;?>" class="button expanded sumachigre">sellar aguila</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/aviles/<?=$user_data[0]->id;?>" class="button expanded sumachigre">sellar aviles</a></li>
			<li><a data-url="<?=base_url()?>passport/sello/poniente/<?=$user_data[0]->id;?>" class="button expanded sumachigre">sellar poniente</a></li>
		</ul>

	</div>
	</div>
	</div>

</div>