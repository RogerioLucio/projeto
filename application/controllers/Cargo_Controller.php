<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_Controller extends CI_Controller {

public function cadastro(){
	if($this->session->userData[0]->tipo_usuario == 'administrador'){
		$this->load->model('Cargo_Model');
		$this->form_validation->set_rules('novoCargo', 'Novo Cargo', 'required');
		if($this->form_validation->run() == TRUE){
			$resultado = $this->Cargo_Model->insert();
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