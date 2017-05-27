<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_Model extends CI_Model{



	public function get_user_data_by__email(){
		$email = $this->input->post('email');
		$this->db->select("id_usuario, nome_usuario, email_usuario");
		$this->db->from("usuario");
		$this->db->where("email_usuario",$email);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
  	}

		public function atualiza_senha(){
	  $id = $this->input->post('id');
	  $password = $this->input->post('password');
	  $this->form_validation->set_rules('password', 'Senha', 'required');
	  if($this->form_validation->run() == FALSE){
			redirect("usuario/recuperar/".$id);
	  }else{
			//$passwordhash = password_hash($password,PASSWORD_BCRYPT);
			$this->db->set("senha_usuario",$password);
			$this->db->where('id_usuario', $id);
			$this->db->update("usuario");
	  }

	  return true;
  }


	function login(){
		$prontuario = $this->input->post('prontuario');
		$senha = $this->input->post('senha');

		$this->db->select("nome_usuario, tipo_usuario, prontuario_usuario, id_setor, id_cargo, id_usuario");
		$this->db->from("usuario");
		$this->db->where('prontuario_usuario',$prontuario);
		$this->db->where('senha_usuario',$senha);

		$query = $this->db->get();
		$resultado = $query->result();
		return $resultado;
	}

		public function getUsuario($id){
		$this->db->select("id_usuario, nome_usuario, email_usuario");
		$this->db->from("usuario");
		$this->db->where("id_usuario",$id);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
  	}

public function send_email($dado){
	  if($dado->email_usuario == null){
			return false;
	  }else{
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('teste@teste.com.br', 'Emprestimo');
		$this->email->to($dado->email_usuario);
		$this->email->subject('Reenvio de Senha');
		$this->email->message($dado->nome_usuario."Recebeca sua mensagem <a href=".base_url("/usuario/recuperar/".$dado->id_usuario).">Recuperar Senha!</a>");
		$this->email->send();
		return true;
	  }
  }  	

	function cadastro(){
		$prontuario = $this->input->post('prontuario');
		$senha = $this->input->post('senha');
		$nome = $this->input->post('nome');
		$rg = $this->input->post('rg');
		$cpf = $this->input->post('cpf');
		$email = $this->input->post('email');
		$login = $this->input->post('login');
		$data_nasc = $this->input->post('data_nasc');
		$telefone = $this->input->post('telefone');
		$celular = $this->input->post('celular');
		$observacoes = $this->input->post('observacoes');
		$sexo = $this->input->post('sexo');
		$cargo = $this->input->post('cargo');
		$setor = $this->input->post('setor');

		$this->db->set('prontuario_usuario', $prontuario);
		$this->db->set('senha_usuario', $senha);
		$this->db->set('nome_usuario', $nome);
		$this->db->set('rg_usuario', $rg);
		$this->db->set('cpf_usuario', $cpf);
		$this->db->set('email_usuario', $email);
		$this->db->set('login_usuario', $login);
		$this->db->set('nascimento_usuario', $data_nasc);
		$this->db->set('telefone_usuario', $telefone);
		$this->db->set('celular_usuario', $celular);
		$this->db->set('observacoes_usuario', $observacoes);
		$this->db->set('sexo_usuario', $sexo);
		$this->db->set('id_cargo', $cargo);
		$this->db->set('id_setor', $setor);
		$this->db->insert('usuario');
		return true;
	}

	function getCargo(){
		$this->db->select("*");
		$this->db->from("cargo");
		$query = $this->db->get();
		$resultado = $query->result();
		return $resultado;
	}

	function getSetor(){
		$this->db->select("*");
		$this->db->from("setor");
		$query = $this->db->get();
		$resultado = $query->result();
		return $resultado;
	}
}
