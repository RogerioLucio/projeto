
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_Controller extends CI_Controller {
	

	public function getCategorias(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->model('Categoria_Model');
			$categorias = $this->Categoria_Model->getCategorias();
			echo json_encode($categorias);
		}else{
			redirect(base_url('/'));
		}
				
	}

	public function getById(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$id_categoria = $this->input->post('id_categoria');
			$this->load->model('Categoria_Model');
			$resultado = $this->Categoria_Model->getById($id_categoria);

			echo json_encode($resultado);
		}else{
			redirect(base_url('/'));
		}
	}


	public function cadastro(){
	if($this->session->userData[0]->tipo_usuario == 'administrador'){
		$this->load->model('Categoria_Model');
		$this->form_validation->set_rules('novaCategoria', 'Nova Categoria', 'required');
		if($this->form_validation->run() == TRUE){
			$resultado = $this->Categoria_Model->insert();
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


