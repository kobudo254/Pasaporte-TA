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

		$data['msg'] = "Visita registrada correctamente. ¡Gracias!";

		echo json_encode($data);
	}	

}
