<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Controller extends CI_Controller {

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



	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('usuario/Login');
	}
	/**
	*   Carrega o cabeçalho da home
	*	Carrega a nav
	*	Carrega a view da home
	*	Verifica se o usuário está logado
	*/
	public function home(){
		$this->load->library('session');
		if($this->session->userData[0]->tipo_usuario == 'Administrador' || $this->session->userData[0]->tipo_usuario == 'administrador'  ){
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('home');

		}else{
			redirect(base_url('/'));
		}

	}


	public function recupera_senha()
	{
		$this->load->view('common/header');
		$this->load->view('usuario/recupera_senha');
	}



	/**
	* Faz a validação do Email que o usuário informa em recupera_senha
	* redireciona para página de Login
	*/
	public function recupera_senha_model(){
		$this->load->model('Usuario_Model','usuariomodel');
		$user = $this->usuariomodel->get_user_data_by__email();
		$resultado = $this->usuariomodel->send_email($user);
		if($resultado  == false){
			echo "ERRO";
		}else{
			redirect('/');
		}
	}

	/**
	* Recebe o id quando o usuário clica no link recebido por email
	*/
	function recuperar($id){
		$this->load->model('Usuario_Model','usuariomodel');
		$dados['usuario'] = $this->usuariomodel->getUsuario($id);
		$this->load->view('common/header');
		$this->load->view('usuario_controller/editar_senha',$dados);
	}

	/**
	* Faz a validação para atualizar a senha no banco de dados do Usuário
	*/
	function recuperar_model(){
		$this->load->model('Usuario_Model','usuariomodel');
		$this->usuariomodel->atualiza_senha();
	}


	/**
	* Recebe o post e faz a validação e redireciona para a página caso o usuário não se logou com sucesso
	*/
	public function login_model(){

		$this->load->model('Usuario_Model','usuariomodel');
		$this->form_validation->set_rules('prontuario','Prontuario','required');
		$this->form_validation->set_rules('senha','Senha','required');
		if($this->form_validation->run() == TRUE){
			$resultado = $this->usuariomodel->login();
			if($resultado == null){

			   $this->load->view('common/header');
			   $data['text_email_error'] = 'E-mail ou Senha Incorretos';
				$this->load->view('usuario/Login', $data);
			}else{
				$this->load->library('session');
				$this->session->set_userdata('userData', $resultado);
				//echo $this->session->userData[0]->nome_usuario;
				//exit;
				//echo $this->session->userData;
				redirect('usuario_controller/home');
			}
		}else{
			echo validation_errors();
		}
	}

	public function cadastro_model(){
		$this->load->model('Usuario_Model','usuariomodel');
		$this->form_validation->set_rules('prontuario','Prontuario','required');
		$this->form_validation->set_rules('senha','Senha','required');
		if($this->form_validation->run() == TRUE){
			$resultado = $this->usuariomodel->cadastro();
			if($resultado == true){
				redirect('usuario/bem_vindo');
			}else{
				redirect('usuario');
			}
			
			
		}else{
			echo validation_errors();
		}
	}

	public function cadastro(){
		//print_r($_SESSION) ;exit;
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->model('Usuario_Model','usuariomodel');
			$data['cargo'] = $this->usuariomodel->getCargo();
			$data['setor'] = $this->usuariomodel->getSetor();
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('usuario/cadastro',$data);

		}else{
			redirect(base_url('/index.php/usuario/index'));
		}

	}

 	public function bem_vindo(){
 		echo "Bem Vindo";
 	}
}
