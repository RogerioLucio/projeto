<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral_Controller extends CI_Controller {
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

	public function CarregaSelectEspacos(){
		$this->load->model('Geral');
		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Geral->getSelectEspacos($varId);
				echo json_encode($dados);
			}else{
				$dados  = $this->Geral->getSelectEspacos();
				echo json_encode($dados) ;
		}
	}

	public function CarregaSelectCargos(){
		$this->load->model('Geral');
		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Geral->getSelectCargos($varId);
				echo json_encode($dados);
			}else{
				$dados  = $this->Geral->getSelectCargos();
				echo json_encode($dados) ;
		}
	}

	public function CarregaSelectSetor(){
		$this->load->model('Geral');
		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Geral->getSelectSetor($varId);
				echo json_encode($dados);
			}else{
				$dados  = $this->Geral->getSelectSetor();
				echo json_encode($dados) ;
		}
	}


	public function CarregaSelectCategorias(){
		$this->load->model('Geral');
		if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados_categorias = $this->Geral->getSelectCategorias($varId);
				echo json_encode($dados_categorias);
			}else{
				$dados_categorias  = $this->Geral->getSelectCategorias();
				echo json_encode($dados_categorias);
			}
	}
}
