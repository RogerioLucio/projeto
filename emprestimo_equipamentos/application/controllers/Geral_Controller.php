<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral_Controller extends CI_Controller {


	public function CarregaSelectEspacos(){

	$this->load->model('Geral');

		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Geral->getSelectEspacos($varId);
				echo json_encode($dados) ;
			}else{
				$dados  = $this->Geral->getSelectEspacos();
				echo json_encode($dados) ;
			}
	}

	public function CarregaSelectCategorias(){
				$this->load->model('Geral');

		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Geral->getSelectCategorias($varId);
				echo json_encode($dados) ;
			}else{
				$this->load->view('common/header');
				$this->load->view('common/nav');
				$dados  = $this->Relatorios->getSelectCategorias();
				echo json_encode($dados) ;
			}
	}


	
}
