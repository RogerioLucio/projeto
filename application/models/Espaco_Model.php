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

	


}