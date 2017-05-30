
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_Controller extends CI_Controller {


	public function index()
	{
	
	}
	
	public function getUsuarios(){
		$this->load->model('Relatorios');
		$dados['resultado'] = $this->Relatorios->getRelatorioUsuarios();
		//$this->load->view('relatorios/usuarios',$dados);
		echo json_encode($dados) ;		
	}
	
}


