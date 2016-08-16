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
		$final = date("Y-m-d", strtotime("+".FECHA_VALIDED." month"));
		$this->sidrerias->reset_pasaporte($final);

		//Asociamos premios logros
		$this->sidrerias->reset_logros($user_id);


		//Loading view
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'web/passport_init';
		$this->load->view('web/wrap',$data);

	}


	//Añadir sello y comprueba condiciones para premio
	public function sello($chigre,$user){

		$sidreria = "ta_".$chigre; // "ta_chigre1, ta_chigre2" para conocer el nombre del campo a actualizar
		
		$this->sidrerias->visitar($sidreria,$user);

		redirect('auth/dashboard');

	}	


}
