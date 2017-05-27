<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cargo_Model extends CI_Model{

	public function insert(){

		$nome = $this->input->post('novoCargo');

		$this->db->set('nome_cargo' , $nome);

		$retorno = $this->db->insert('cargo');

		return $retorno;

	}

}