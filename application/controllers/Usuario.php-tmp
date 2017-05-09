<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index() {
		$this->load->view('common/header');
		$this->load->view('usuario/Login');
	}

	/**
	 * Recebe o post e faz a validação e redireciona para a página caso o usuário não se logou com sucesso
	 */
	public function login_model() {

		$this->load->model('UsuarioModel', 'usuariomodel');
		$this->form_validation->set_rules('prontuario', 'Prontuario', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		if ($this->form_validation->run() == TRUE) {
			$resultado = $this->usuariomodel->login();
			if ($resultado == null) {
				echo "ERRO";
			} else {
				redirect('usuario/bem_vindo');
			}
		} else {
			echo validation_errors();
		}

	}

	public function cadastro_model() {
		$this->load->model('UsuarioModel', 'usuariomodel');
		//print_r($_POST);
		exit();

		$this->form_validation->set_rules('prontuario', 'Prontuario', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		if ($this->form_validation->run() == TRUE) {
			$resultado = $this->usuariomodel->cadastro();
			if ($resultado == true) {
				redirect('usuario/bem_vindo');
			} else {
				redirect('usuario');
			}

		} else {
			echo validation_errors();
		}
	}

	public function cadastro() {
		$this->load->model('UsuarioModel', 'usuariomodel');
		$data['cargo'] = $this->usuariomodel->getCargo();
		$data['setor'] = $this->usuariomodel->getSetor();
		$this->load->view('common/header');
		$this->load->view('usuario/cadastro', $data);
	}

	public function bem_vindo() {
		echo "Bem Vindo";
	}
}
