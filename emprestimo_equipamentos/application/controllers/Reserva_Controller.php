<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_Controller extends CI_Controller {

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



	public function index()
	{
		$this->load->model('Categoria_Model');
		$data['categorias'] = $this->Categoria_Model->getCategorias();
		$this->load->model('Espaco_Model');
		$data['espacos'] = $this->Espaco_Model->getEspacos();
		$this->load->model('Equipamento_Model');
		$data['equipamentos'] = $this->Equipamento_Model->getEquipamentos();
		$this->load->view('common/header');
		$this->load->view('common/nav');
		$this->load->view('reserva/cadastro',$data);
	}

	
}
