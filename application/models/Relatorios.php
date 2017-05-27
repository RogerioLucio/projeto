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
	
		$reserva;
		foreach ($query->result() as $key => $value) {
			$reserva[$key] = $value;
		}		
		return $equipamentos;
				
	}
	
	public function getRelatorioPatrimonio($id = ""){
		if($id){
				$query =$this->db->where('id_equipamento', $id);
				$query = $this->db->get('equipamento');
		}else{
			$this->db->from('equipamento');
			$this->db->join('categoria', 'equipamento.id_categoria = categoria.id_categoria');
			$query = $this->db->get();
		}
		$patrimonio_login;
		foreach ($query->result() as $key => $value) {
			$patrimonio_login[$key] = $value;
		}	
		return $patrimonio_login;
  	}
  	public function getRelatorioUsuarios($id = ""){
		if($id){
				$this->db->where('id_usuario', $id);
				$this->db->from('usuario');
				$this->db->join('cargo', 'usuario.id_cargo = cargo.id_cargo');
				$query = $this->db->get();
		}else{
			$this->db->from('usuario');
			$this->db->join('cargo', 'usuario.id_cargo = cargo.id_cargo');
			$query = $this->db->get();
		}
		$usuarios;
		foreach ($query->result() as $key => $value) {
			$usuarios[$key] = $value;
		}	
		return $usuarios;
  	}

  public function getRelatoriosReserva($id = ""){

		if($id){
			$this->db->where('auxiliar', (int)$id);
			$this->db->from('reserva');
			$this->db->join('categoria', 'reserva.id_categoria = categoria.id_categoria');
			$this->db->join('equipamento', 'equipamento.id_equipamento = reserva.id_equipamento');
			$this->db->join('usuario', 'usuario.id_usuario = reserva.id_usuario');
			$query = $this->db->get();


				//$query = $this->db->get('reserva');
		}else{
			$this->db->from('reserva');
			$this->db->group_by("reserva.auxiliar");
			$this->db->join('categoria', 'reserva.id_categoria = categoria.id_categoria');
			$this->db->join('equipamento', 'equipamento.id_equipamento = reserva.id_equipamento');
			$this->db->join('usuario', 'usuario.id_usuario = reserva.id_usuario');
			$query = $this->db->get();
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

	public function Update_Patrimonio($POST = ''){
		//$id = $this->input->post('id');
		//echo ($_POST); exit;
		$this->db->set("nome_equipamento",$this->input->post('nome_equipamento'));
		$this->db->set("id_categoria",$this->input->post('id_categoria'));
		$this->db->set("status_equipamento",$this->input->post('status_equipamento'));
		$this->db->set("id_espaco",$this->input->post('id_espaco'));
		$this->db->where('id_equipamento', $this->input->post('id_equipamento'));
		$this->db->update("equipamento");
		return $this->db->last_query();
	}

	public function Update_Usuario($POST = ''){
	
		$this->db->set("nome_usuario",$this->input->post('nome_usuario'));
		$this->db->set("rg_usuario",$this->input->post('rg_usuario'));
		$this->db->set("tipo_usuario",$this->input->post('tipo_usuario'));
		$this->db->set("prontuario_usuario",$this->input->post('prontuario_usuario'));
		$this->db->set("senha_usuario",$this->input->post('senha_usuario'));
		$this->db->set("login_usuario",$this->input->post('login_usuario'));
		$this->db->set("email_usuario",$this->input->post('email_usuario'));
		$this->db->set("cpf_usuario",$this->input->post('cpf_usuario'));
		$this->db->set("nascimento_usuario",$this->input->post('nascimento_usuario'));
		$this->db->set("telefone_usuario",$this->input->post('telefone_usuario'));
		$this->db->set("celular_usuario",$this->input->post('celular_usuario'));
		$this->db->set("observacoes_usuario",$this->input->post('observacoes_usuario'));
		$this->db->set("sexo_usuario",$this->input->post('sexo_usuario'));
		$this->db->set("data_senha_usuario",$this->input->post('data_senha_usuario'));
		$this->db->set("status_usuario",$this->input->post('status_usuario'));
		$this->db->set("id_cargo",$this->input->post('cargo'));
		$this->db->set("id_setor",$this->input->post('setor'));
		$this->db->where('id_usuario', $this->input->post('id_usuario'));
		$this->db->update("usuario");
		var_dump($this->db->last_query());
		return $this->db->last_query();
	}


}