<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relatorios extends CI_Model{
	

	function insert(){
		$patrimonio = $this->input->post('patrimonio');
		$status = $this->input->post('status');
		$categoria = $this->input->post('categoria');

		$this->db->set('patrimonio_equipamento' , $patrimonio);

		$this->db->set('status_equipamento' , $status);

		$this->db->set('id_categoria', $categoria);

		$retorno = $this->db->insert('equipamento');

		return $retorno;

	}

	public function getRelatorioReserva(){
		$query = $this->db->get('reserva');
		echo "<pre>" ;var_dump($query->result()); exit;
		$reserva;
		foreach ($query->result() as $key => $value) {
			$reserva[$key] = $value;
		}		
		return $equipamentos;
				
	}
	public function getRelatorioPatrimonio(){
		$query = $this->db->get('equipamento');
	    
		$equipamento;
		foreach ($query->result() as $key => $value) {
			$equipamento[$key] = $value;
		}		
		return $query->result();

	}

	public function getRelatorioPatrimonioById($id = ""){
		if($id){
				$query =$this->db->where('id_equipamento', $id);
				$query = $this->db->get('equipamento');
		}else{
			$query = $this->db->get('equipamento');
		}
		
		$patrimonio_login;
		foreach ($query->result() as $key => $value) {
			$patrimonio_login[$key] = $value;
		}	
		return $patrimonio_login;
  	}

	function select(){
		$patrimonio = $this->input->post('num_patrimonio');
		$query = $this->db->get_where('equipamento', array('patrimonio_equipamento' => $patrimonio), 1);
		$equipamento = null; 
		foreach ($query->result() as $row) {
			$equipamento = $row;
		}
		return $equipamento;
				
	}

	function update(){
		$data = $this->input->post('Campos');

		if($data['status_equipamento'] == 'Descartado'){

			$equipamento = array(
				array(
					'patrimonio_equipamento' => $data['patrimonio_equipamento'],
					'status_equipamento' => $data['status_equipamento'],
					'id_categoria' => $data['id_categoria'],
					'data_delet_excl' => date("Y-m-d H:i:s")

					)
				);	
		}else{
			$equipamento = array(
				array(
					'patrimonio_equipamento' => $data['patrimonio_equipamento'],
					'status_equipamento' => $data['status_equipamento'],
					'id_categoria' => $data['id_categoria']

					)
				);			
		}


				
		$retorno = $this->db->update_batch('equipamento', $equipamento, 'patrimonio_equipamento');
		return $retorno;

	}


	function delete(){
		$patrimonio = $this->input->post('patrimonio');
		$retorno = $this->db->delete('equipamento' , array('patrimonio' => $patrimonio));
		return $retorno;

	}


}