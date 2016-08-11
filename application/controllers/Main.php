<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{

		//Vista principal
		$data['seo']['titulo'] = 'Pasaporte Tierra Astur';
		$data['page'] = 'web/inicio';
		$this->load->view('web/wrap',$data);

	}
}
