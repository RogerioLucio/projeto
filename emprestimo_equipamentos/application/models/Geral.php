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
		
		$espaco;
		foreach ($query->result() as $key => $value) {
			$espaco[$key] = $value;
		}	
		return $espaco;
  	}

	

	



}