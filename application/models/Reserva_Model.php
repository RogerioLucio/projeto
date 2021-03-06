<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserva_Model extends CI_Model
{	public function cadastro_reserva(){
		$this->load->library('session');

		$data['id_usuario'] = $this->session->userData[0]->id_usuario;
		$data['descricao_reserva'] = $this->input->post('descricao_equipamento');
		$data['data_inicio_reserva'] = $this->input->post('data_inicial');
		$data['status_reserva'] = 'Reservado';
		$data['data_final_reserva'] = $this->input->post('data_final');
		$data['id_categoria'] = $this->input->post('categoria');
		$data['id_espaco'] = $this->input->post('espaco');
		$sql = "SELECT auxiliar FROM `reserva` ORDER BY id_reserva DESC LIMIT 1";
		$result = $this->db->query($sql);
		$auxiliar = $result->result();
		$aux = $auxiliar[0]->auxiliar + 1;
		
		foreach($_POST['equipamentos'] as $key =>$item){

			$data['id_equipamento'] = $_POST['equipamentos'][$key];
			$data['auxiliar'] = (empty($auxiliar) ? 1 : $aux);
			$id = $this->db->insert('reserva',$data);
			$dados['id_reserva'] = $id;
			$dados['id_equipamento'] = $this->input->post('quantidade');
			$dados['quantidade'] = $this->input->post('quantidade');
			$id = $this->db->insert('equipamento_reservado',$dados);

		}	

  	}

  	
  	public function cadastra_documento(){
  		$data['data_inicial'] = $this->input->post('data_inicial');
  		$data['data_final'] = $this->input->post('data_final');
  		$data['prontuario'] = $this->input->post('prontuario');
  		$data['id_espaco'] = $this->input->post('espaco');
  		$this->db->insert('documento',$data);

  	}

  	public function devolucao($id, $id_equipamento){
  		$this->db->set('status_reserva', 'Finalizado');
  		$this->db->where('auxiliar', $id);
  		$retorno[0] = $this->db->update('reserva');
  		$this->load->model('Equipamento_Model', 'equipamento');
  		$retorno[1] = $this->equipamento->update_status($id_equipamento, 1);
		return $retorno;
  	}  	

}
