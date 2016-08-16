<ul class="no-bullet">
	<li>#<?=$user_data[0]->id;?></li>
	<li><?=$user_data[0]->user_email;?></li>
	<li>Fecha caducidad: <?=date("d/m/Y",strtotime($user_data[0]->fecha_fin));?></li>
	<li>TA Parrilla: <?=$user_data[0]->ta_parrilla;?> visitas</li>
	<li>TA Gascona: <?=$user_data[0]->ta_gascona;?> visitas</li>
	<li>TA Aviles: <?=$user_data[0]->ta_aviles;?> visitas</li>
	<li>TA Poniente: <?=$user_data[0]->ta_poniente;?> visitas</li>
	<li>TA Aguila: <?=$user_data[0]->ta_aguila;?> visitas</li>
	<li> <hr> </li>
	<li>
		<strong>Visitas a Tierra Astur:</strong> <?=$total;?>
	</li>
</ul>
