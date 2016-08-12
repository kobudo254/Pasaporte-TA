<div role="main" class="ui-content">


    <h2 class="mc-text-center">Abrir su pasaporte Tierra Astur</h2>

<? 
	if(isset($_SESSION['message_error'])):
?>
	<div class="error"><?=$_SESSION['message_error']?></div>

<? endif; ?>

	<form method="post" action="<?=base_url()?>auth/login/" id="login-form">


		<label for="correo">Introduzca su email:</label>
		<input type="email" class="mc-top-margin-1-5" name="correo"  placeholder="Introduzca su email" required>
		<input type="submit" class="ui-btn ui-btn-inline ui-btn-c" value="Entrar">

	</form>


</div><!-- /content -->