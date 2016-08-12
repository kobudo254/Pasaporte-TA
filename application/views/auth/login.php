<div role="main" class="ui-content">


    <h2 class="mc-text-center">Abrir su pasaporte Tierra Astur</h2>

<? 
	if(isset($_SESSION['message_error'])):
?>
	<div class="error"><?=$_SESSION['message_error']?></div>

<? endif; ?>

	<form method="post" action="<?=base_url()?>auth/login/" id="login-form">

		<?=validation_errors(); ?>

		<label for="correo">Introduzca su email:</label>
		<input class="mc-top-margin-1-5" type="text" name="correo" id="correo" 	placeholder="Dirección email" value="">
		    <a href="#" onclick="$('#login-form').submit();" class="ui-btn ui-btn-inline ui-btn-b">Black Button</a>

	</form>


</div><!-- /content -->