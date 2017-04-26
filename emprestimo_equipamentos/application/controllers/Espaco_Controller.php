<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espaco_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	function getEspacos(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->model('Espaco_Model');
			$resultado = $this->Espaco_Model->getEspacos();
			echo json_encode($resultado);
		}else{
			redirect(base_url('/'));
		}
	}

}