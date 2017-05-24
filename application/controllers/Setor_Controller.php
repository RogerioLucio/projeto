<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_Controller extends CI_Controller {
	
	public function cadastro(){
	if($this->session->userData[0]->tipo_usuario == 'administrador'){
		$this->load->model('Setor_Model');
		$this->form_validation->set_rules('novoSetor', 'Novo Setor', 'required');
		if($this->form_validation->run() == TRUE){
			$resultado = $this->Setor_Model->insert();
			if($resultado == null){
				echo "ERRO";
			}else{
				redirect('equipamento/viewCadastro');
			}
		}else{
			echo validation_errors();
		}
	}else{
		redirect('/');
	}
}




}