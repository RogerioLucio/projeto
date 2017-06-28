<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipamento_Model extends CI_Model{
	

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

	public function getQuantidadeEquipamento() {
		$sql = $this->db->query("SELECT DISTINCT categoria.id_categoria, count(equipamento.id_categoria) as quantidade
		from equipamento JOIN categoria on categoria.id_categoria = equipamento.id_categoria GROUP BY categoria.id_categoria");
		$query= $sql->result();
		return $query;
	

	}

	public function getEquipamentos(){
		$query = $this->db->get('equipamento');
		$equipamentos;
		foreach ($query->result() as $key => $value) {
			$equipamentos[$key] = $value;
		}		
		return $equipamentos;
				
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

	function update_status($id_equipamento = null, $status = null){
		$this->db->set('status_equipamento', $status);
		$i = 0;
		foreach ($id_equipamento as $id) {
	    	if($i == 0){
	    		$this->db->where('id_equipamento', $id);
	    	}else{
	    		$this->db->or_where('id_equipamento', $id);
	    	}
	    	$i++;
		}
	    $retorno = $this->db->update('equipamento');
		return $retorno;
	}	


	function delete(){
		$patrimonio = $this->input->post('patrimonio');
		$retorno = $this->db->delete('equipamento' , array('patrimonio' => $patrimonio));
		return $retorno;

	}


}