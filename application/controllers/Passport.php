<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passport extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->output->enable_profiler(TRUE);
	}

	//Inicia un nuevo pasaporte y crea todo lo necesario mientras se muestra un inicializador
	public function init($user_id){


		//Creamos la ficha de los 5 centros a 0 visitas. Fecha valided pasaporte		
		$final = date("Y-m-d", strtotime("+".FECHA_VALIDED." month"));
		$this->user_model->reset_pasaporte($final);

		//Asociamos premios logros
		$this->user_model->reset_logros($user_id);


		//Loading view
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'web/passport_init';
		$this->load->view('web/wrap',$data);

	}


}
