<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setor_Model extends CI_Model{

	public function insert(){
		$nome = $this->input->post('novoSetor');

		$this->db->set('nome_setor' , $nome);

		$retorno = $this->db->insert('setor');

		return $retorno;

	}

}