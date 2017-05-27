<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Espaco_Model extends CI_Model{
	

	
	public function getEspacos(){
		$query = $this->db->get('espaco');
		$espacos;
		foreach ($query->result() as $key => $value) {
			$espacos[$key] = $value;
		}		
		return $espacos;
				
	}

	public function insert(){
		
		$local = $this->input->post('local');
		$descricao = $this->input->post('descricao_espaco');

		$this->db->set('local_espaco' , $local);
		$this->db->set('descricao_espaco' , $descricao);


		$retorno = $this->db->insert('espaco');

		return $retorno;

	}


}