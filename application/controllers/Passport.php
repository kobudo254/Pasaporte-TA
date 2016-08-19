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
		$final = date("Y-m-d", strtotime("+".VALIDED." month"));
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
		$tipo_logro_uno ="desactivado";
		$tipo_logro_dos ="desactivado";
		$tipo_logro_tres ="desactivado";

		switch($totales){
			case $totales < 3 : 	$falta = 3 - $totales;
									$output_msg .= "¡Ánimo! Solo te falta ".$falta." visita(s) para recibir tu primer premio. ";									
									break;
			case $totales == 3 :	$output_msg .= "¡Enohrabuena! Has conseguido tu primer premio: <br> <h6><strong>¡Postres y bebida gratis!</strong></h6> <p>Te hemos enviado un cupón por correo. ¡Sigue sellando visitas a TA!</p>";
									$tipo_logro_uno="activado";
									// Update database a true, enviar cupon por email, adjuntar image
									break;
			case $totales>3 && $totales < 6 : 	$falta = 6 - $totales;
									$output_msg .= "¡Ánimo! Solo te falta ".$falta." visita(s) para recibir tu segundo premio. ";	
									$tipo_logro_uno="activado";
									break;
			case $totales == 6 :	$output_msg .= "¡Enohrabuena! Has conseguido tu segundo premio: <br> <h6><strong>¡Menú especial para 2 personas!</strong></h6> <p>Revisa tu email. ¡Sigue sellando visitas a TA!</p>";
									$tipo_logro_uno="activado";
									$tipo_logro_dos="activado";
									// Update database a true, enviar cupon por email, adjuntar image
			case $totales>6 && $totales < 10 : 	$falta = 10 - $totales;
									$output_msg .= "¡Ánimo! Solo te falta ".$falta." visita(s) para recibir tu gran premio. ";	
									$tipo_logro_uno="activado";
									break;
			case $totales == 10 :	//COMPROBAR SI HAY ALGUNA SIDREA a 0. SINO VAMOS POR DELUXE
									$output_msg .= "¡Enohrabuena! Has conseguido tu segundo premio: <br> <h6><strong>¡Cena a la carta para 2 personas!</strong></h6> <p>Revisa tu email. ¡Sigue sellando visitas a TA!</p>";
									$tipo_logro_uno="activado";
									$tipo_logro_dos="activado";
									// Update database a true, enviar cupon por email, adjuntar image
									break;
			default: return false;
					break;
		}

		$output_msg.="<ul class='menu logritos'>
						<li width='33%'><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_3.jpg' class='logro ".$tipo_logro_uno."' alt='Postres y bebidas gratis' /></a</li>
						<li width='33%'><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_3.jpg' class='logro ".$tipo_logro_dos."' alt='Postres y bebidas gratis' /></a</li>
						<li width='33%'><a href='".base_url()."passport/help'><img src='".base_url()."assets/images/premio_3.jpg' class='logro ".$tipo_logro_tres."' alt='Postres y bebidas gratis' /></a</li>
					  </ul>";


		$data['msg'] = $output_msg;

		echo json_encode($data);
	}	

}
