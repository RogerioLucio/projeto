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

	public function getCategoriaQuantidade(){
		$sql = $this->db->query("SELECT DISTINCT categoria.id_categoria, categoria.descricao_categoria, equipamento.id_equipamento, count(equipamento.id_categoria) as quantidade
		from categoria LEFT JOIN equipamento on categoria.id_categoria = equipamento.id_categoria 
		LEFT JOIN equipamento_reservado on equipamento_reservado.id_equipamento = equipamento.id_equipamento  GROUP BY categoria.id_categoria");
		$query= $sql->result();
		return $query;
	}
	public function getCategoriaIdEquipamento(){
		$sql = $this->db->query("SELECT equipamento.id_equipamento
								FROM equipamento
								WHERE equipamento.id_equipamento NOT IN (
							    SELECT equipamento_reservado.id_equipamento 
							    FROM equipamento_reservado)");
		$query= $sql->result();
		return $query;
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