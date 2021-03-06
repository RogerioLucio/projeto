<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios_Controller extends CI_Controller {

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

	

	/**
	* Recebe o post e faz a validação e redireciona para a página caso o usuário não se logou com sucesso
	*/
	public function relatorio(){
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->model('Relatorios');
			$resultado = $this->Relatorios->getRelatorioReserva();
			echo $return; exit;
			$this->load->view('relatorios/requisicao',$return);
			

	}

	public function Relatorio_Patrimonio(){
			$this->load->model('Relatorios');
			
			if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Relatorios->getRelatorioPatrimonio($varId);
				echo json_encode($dados) ;
			}else{
				$this->load->view('common/header');
				$this->load->view('common/nav');
				$dados['resultado'] = $this->Relatorios->getRelatorioPatrimonio();
				$this->load->view('relatorios/patrimonio',$dados);
			}
	}



	public function Relatorio_Reservas(){
			$this->load->model('Relatorios');
			if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Relatorios->getRelatoriosReserva($varId);
				echo json_encode($dados) ;
			}else{
				$this->load->view('common/header');
				$this->load->view('common/nav');
				$dados['resultado'] = $this->Relatorios->getRelatoriosReserva();
				$this->load->view('relatorios/reserva',$dados);
			}
	}



	public function Relatorio_Usuarios(){
			$this->load->model('Relatorios');
			if(isset($_POST['id'])){
				$varId = $_POST['id'];
				$dados = $this->Relatorios->getRelatorioUsuarios($varId);
				echo json_encode($dados) ;
			}else{
				$this->load->view('common/header');
				$this->load->view('common/nav');
				$dados['resultado'] = $this->Relatorios->getRelatorioUsuarios();
				$this->load->view('relatorios/usuarios',$dados);
				//echo json_encode($dados) ;
			}
	}


	public function atualiza(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->model('Equipamento_Model');
				$resultado = $this->Equipamento_Model->update();
				if($resultado == 0){
					$mensagem = 'Ocorreu um erro.';
				}else{
					$mensagem = 'Atualizado com sucesso!';
				}		

			$mensagem = json_encode($mensagem);
			
				echo $mensagem;
		}else{
			redirect(base_url('/'));
		}
	
	}

	public function select(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->model('Equipamento_Model');
			$resultado = $this->Equipamento_Model->select(); 
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('equipamento/equipamento_cadastro', $resultado);
		}else{
			redirect(base_url('/'));
		}
	}

	public function viewCadastro(){
		if($this->session->userData[0]->tipo_usuario == 'administrador'){
			$this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('equipamento/equipamento_cadastro');
		}else{
			redirect(base_url('/'));
		}
	}

 	public function sucesso(){
 		echo "Equipamento cadastrado com Sucesso =p!";
 	}


	public function Atualizar_Patrimonio(){

		if(isset($_POST)){
			$this->load->model("Relatorios");
		 	$res = $this->Relatorios->Update_Patrimonio($_POST);
		 	echo $res;
		}
	}


	public function Atualiza_Usuario(){
		if(isset($_POST)){
			$this->load->model("Relatorios");
		 	$res = $this->Relatorios->Update_Usuario($_POST);
		 	echo $res;
		}
	}

	
}
