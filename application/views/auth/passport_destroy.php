<div class="large-6 columns small-12 large-centered small-centered text-center">
<div class=="row">

	<h5>¡Enhorabuena!</h5>
	<h6> Has conseguido el gran premio.</h6>

	<? if ($deluxe == true): ?>

		<h6><strong>¡SUPERCENA DELUXE A LA CARTA PARA DOS!</strong></h6> 
		<a href='<?=base_url()?>passport/help'><img src='<?=base_url()?>assets/images/deluxe.jpg' class='thumbnail logro activado' alt='Supercena a la carta' /></a>

	<? else: ?>

		<h6><strong>¡Cena a la carta para 2 personas!</strong></h6> 

		<a href='<?=base_url()?>passport/help'><img src='<?=base_url()?>assets/images/premio_10.jpg' class='thumbnail logro activado' alt='Cena a la carta' /></a>

	<? endif; ?>

	<p>Revisa tu correo para disfrutar de tu premio.</p>

	<p>Ahora puedes volver a participar en el juego.</p>


		<a href="<?=base_url()?>passport/init/<?=$user_id?>" alt="Jugar de nuevo" class="button medium round"><i class="fi-refresh"></i> Jugar de nuevo</a>

		
</div>

</div>
		</div><!-- Cierre callout-->
	</div><!-- Cierre 7 columns-->
</div><!-- Cierre dash-->
