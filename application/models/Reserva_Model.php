<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reserva_Model extends CI_Model{



	public function cadastro_reserva(){
		echo "<pre>";print_r($_POST);echo "</pre>";
		$data['id_usuario'] = $this->input->post('prontuario');
		$data['descricao_reserva'] = $this->input->post('descricao_equipamento');
		$data['data_inicio_reserva'] = $this->input->post('data_inicial');
		$data['data_final_reserva'] = $this->input->post('data_final');
		$data['id_categoria'] = $this->input->post('categoria');
		$data['id_espaco'] = $this->input->post('espaco');
		
		foreach($_POST['equipamentos'] as $key =>$item){

			$data['id_equipamento'] = $_POST['equipamentos'][$key];
			
			$id = $this->db->insert('reserva',$data);
			$dados['id_reserva'] = $id;
			$dados['id_equipamento'] = $this->input->post('quantidade');
			$dados['quantidade'] = $this->input->post('quantidade');
			$id = $this->db->insert('equipamento_reservado',$dados);
		}


		//echo "<pre>";print_r($data);echo "</pre>";exit;

		

  	}

}
