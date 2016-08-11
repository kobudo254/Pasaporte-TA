<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	 public function index(){
	 	
	      $this->load->model('Factura_model');
	      $factura = $this->Factura_model->dame_factura_id($id_factura);
	      $this->load->view('mostrar_factura', $factura);
	   }


	public function mostrar_login()
	{

		//Vista principal
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'web/inicio';
		$this->load->view('web/wrap',$data);

	}
}
