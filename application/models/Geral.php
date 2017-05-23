<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Geral extends CI_Model{
	

	public function getSelectEspacos($id = ""){
		if($id){
				$query =$this->db->where('id_espaco', $id);
				$query = $this->db->get('espaco');
		}else{
			$query = $this->db->get('espaco');
		}
		$espaco;
		foreach ($query->result() as $key => $value) {
			$espaco[$key] = $value;
		}	
		return $espaco;
  	}

  	public function getSelectCategorias($id = ""){
		if($id){
				$query =$this->db->where('id_categoria', $id);
				$query = $this->db->get('categoria');
		}else{
			$query = $this->db->get('categoria');
		}
		$categoria;
		foreach ($query->result() as $key => $value) {
			$categoria[$key] = $value;
  		}
  		return $categoria;
	}

	public function getSelectCargos($id = ""){
		if($id){
				$query =$this->db->where('id_cargo', $id);
				$query = $this->db->get('cargo');
		}else{
			$query = $this->db->get('cargo');
		}
		$cargo;
		foreach ($query->result() as $key => $value) {
			$cargo[$key] = $value;
  		}
  		return $cargo;
	}

	public function getSelectSetor($id = ""){
		if($id){
				$query =$this->db->where('id_setor', $id);
				$query = $this->db->get('setor');
		}else{
			$query = $this->db->get('setor');
		}
		$setor;
		foreach ($query->result() as $key => $value) {
			$setor[$key] = $value;
  		}
  		return $setor;
	}
}