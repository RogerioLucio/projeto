<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria_Model extends CI_Model{
	

	function insert(){
		$descricao = $this->input->post('descricao');

		$this->db->set('descricao_categoria' , $descricao);

		$retorno = $this->db->insert('categoria');

		return $retorno;

	}

	public function getCategorias(){
		$query = $this->db->get('categoria');
		$categorias;
		foreach ($query->result() as $key => $value) {
			$categorias[$key] = $value;
		}		
		return $categorias;
				
	}

	public function getById($id_categoria){
		$query = $this->db->get_where('categoria', array('id_categoria' => $id_categoria));
		$categoria = null;
		foreach ($query->result() as $key => $value) {
			$categoria[$key] = $value;
		}
		return $categoria;
	}

	function delete(){
		$descricao = $this->input->post('descricao');
		$retorno = $this->db->delete('categoria' , array('descricao_categoria' => $descricao));
		return $retorno;

	}


}