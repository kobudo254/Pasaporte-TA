
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
			<br>
			<ul class="no-bullet smaller">
				<li>TA Parrilla: <?=$user_data[0]->ta_parrilla;?> visitas</li>
				<li>TA Gascona: <?=$user_data[0]->ta_gascona;?> visitas</li>
				<li>TA Aviles: <?=$user_data[0]->ta_aviles;?> visitas</li>
				<li>TA Poniente: <?=$user_data[0]->ta_poniente;?> visitas</li>
				<li>TA Aguila: <?=$user_data[0]->ta_aguila;?> visitas</li>
			</ul>

			<h6><strong>Visitas a Tierra Astur:</strong> <?=$total;?></h6>

		<div class="close" id="logout">
				<a href="<?=base_url()?>auth/logout"><img src="<?=base_url()?>assets/images/exit.png" alt="Logout" /></a>			
		</div>

		</div>

	</div>
	</div>
	</div>

</div>