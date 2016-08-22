<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passport extends CI_Controller {

	function __construct(){

		parent::__construct();

		//$this->output->enable_profiler(TRUE);
	}

	//Inicia un nuevo pasaporte y crea todo lo necesario mientras se muestra un inicializador
	public function init($user_id){


		//Creamos la ficha de los 5 centros a 0 visitas. Fecha valided pasaporte		
		//$final = date("Y-m-d", strtotime("+".VALIDED." month"));
		$final = date("Y-m-d", strtotime(VALIDED));
		$this->sidrerias->reset_pasaporte($final);

		//Asociamos premios logros
		$this->sidrerias->reset_logros($user_id);


		//Loading view
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'auth/passport_init';
		$this->load->view('web/wrap',$data);

	}



	// This function call from AJAX
	public function sello($chigre,$user){

		$sidreria = "ta_".$chigre; // "ta_chigre1, ta_chigre2" para conocer el nombre del campo a actualizar		

		$this->sidrerias->visitar($sidreria,$user);

		//Get user info: id, email....
		$data['user_data'] = $this->user_model->read_user_information($this->session->userdata('correo'));

		//Count visits
		$data['total'] = 0;
		$data['total']= $data['user_data'][0]->ta_parrilla + $data['user_data'][0]->ta_gascona + $data['user_data'][0]->ta_aguila + $data['user_data'][0]->ta_poniente + $data['user_data'][0]->ta_aviles;

		echo json_encode($data);
	}



	// This function call from AJAX
	public function check_total($user_id){

		$totales = $this->input->post('total_visitas');

		$output_msg = "";
		$falta = 0;
		$tipo_logro = "";
		$tipo_logro_uno ="desactivado";
		$tipo_logro_dos ="desactivado";
		$tipo_logro_tres ="desactivado";

		switch($totales){
			case $totales < 3 : 	$falta = 3 - $totales;
									$output_msg .= "Solo te falta ".$falta." visita(s) para recibir tu primer premio. ";									
									break;
			case $totales == 3 :	$output_msg .= "¡Enhorabuena! Has conseguido tu primer premio: <br> <h6><strong>¡Postres y bebida gratis!</strong></h6> <p>Te hemos enviado un cupón por correo. <br>¡Sigue sellando visitas a TA!</p>";
									$tipo_logro_uno="activado";
									$this->sidrerias->cobrar_premio($user_id,"tres_visitas");
									$tipo_logro='tres_visitas';		
									$this->session->set_userdata('premio','tres_visitas');	
									$data['premio']=true;
									break;
			case $totales>3 && $totales < 6 : 	$falta = 6 - $totales;
									$output_msg .= "Solo te falta ".$falta." visita(s) para recibir tu segundo premio. ";	
									$tipo_logro_uno="activado";
									break;
			case $totales == 6 :	$output_msg .= "¡Enhorabuena! Has conseguido tu segundo premio: <br> <h6><strong>¡Menú especial para 2 personas!</strong></h6> <p>Revisa tu email. <br>¡Sigue sellando visitas a TA!</p>";
									$tipo_logro_uno="activado";
									$tipo_logro_dos="activado";
									$this->sidrerias->cobrar_premio($user_id,"seis_visitas");
									$tipo_logro='seis_visitas';
									$this->session->set_userdata('premio','seis_visitas');	
									$data['premio']=true;
									break;
			case $totales>6 && $totales < 10 : 	$falta = 10 - $totales;
									$output_msg .= "Solo te falta ".$falta." visita(s) para recibir tu gran premio. ";	
									$tipo_logro_uno="activado";
									$tipo_logro_dos="activado";									
									break;

			default: return false;
					break;
		}
	

		$output_msg.="<ul class='no-bullet logritos'>
						<li width='30%'>3 visitas<br><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_3.jpg' class='logro ".$tipo_logro_uno."' alt='Postres y bebidas gratis' /></a></li>
						<li width='30%'>6 visitas<br><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_6.jpg' class='logro ".$tipo_logro_dos."' alt='Menu especial' /></a></li>
						<li width='30%'>10 visitas<br><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_10.jpg' class='logro ".$tipo_logro_tres."' alt='Cena a la carta' /></a></li>
					  </ul>";


		$data['msg'] = $output_msg;

		echo json_encode($data);

	}	


	//Fin del juego, si todas las sidrerias son mas de 0, premio deluxe
	public function fin($user_id,$deluxe = null){

		$data['user_id'] = $user_id;
		$_to_email = "";

		// COMPROBAR SI HAY ALGUNA SIDREA a 0. SINO VAMOS POR DELUXE
		if($deluxe == null):
			$this->sidrerias->cobrar_premio($user_id,"diez_visitas");
			$_to_email = "diez_visitas";
			$data['deluxe'] = false;
		else:
			$this->sidrerias->cobrar_premio($user_id,"deluxe");
			$data['deluxe'] = true;
			$_to_email = "deluxe";
		endif;
		
		$this->session->set_userdata('premio',$_to_email);		

		//Loading view
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'auth/passport_destroy';
		$this->load->view('web/wrap',$data);

	}

	//Enviar cupon por mail
	public function mailing_me(){

		$correo = $this->session->userdata('correo');
		$premio = $this->session->userdata('premio');

		$this->load->library('email');

		$subject = 'Pasaporte Sidrerías Tierra Astur - Su premio';
		$message = '<h5>Gracias por participar en el Pasporte Tierra Astur.</h5><p> Este es el cupon de su premio. Solo tiene que imprimirlo y mostrarlo a la cajera de cualquiera de nuestras sidrerías. No olvide reclamarlo <b>antes</b> de sentarse a una mesa, para que puedan coordinarse adecuadamente con el maitre y resto de camareros.</p>
			<p><a href="http://passport.tierra-astur.es/pdf/cupon_'.$premio.'.pdf">DESCARGAR PREMIO</a></p>
			<p> Siga participando y acumule más visitas.</p>';

		// Get full html:
		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
		    <title>' . html_escape($subject) . '</title>
		    <style type="text/css">
		        body {
		            font-family: Arial, Verdana, Helvetica, sans-serif;
		            font-size: 16px;
		        }
		    </style>
		</head>
		<body>
		' . $message . '
		</body>
		</html>';
		// Also, for getting full html you may use the following internal method:
		$body = $this->email->full_html($subject, $message);

		$result = $this->email
		        ->from('online@crivencar.com')
		        ->reply_to('online@crivencar.com')    // Optional, an account where a human being reads.
		        ->to($correo)
		        ->subject($subject)
		        ->message($body)
		        ->send();

		$debug = $this->email->print_debugger();
		echo json_encode($result);
	}

}
