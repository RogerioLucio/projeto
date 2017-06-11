<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_Controller extends CI_Controller {

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
		$this->load->model('Categoria_Model');
		$data['categorias'] = $this->Categoria_Model->getCategoriaQuantidade();

		
		$data['equipamento_id'] = $this->Categoria_Model->getCategoriaIdEquipamento();
		
		$this->load->model('Espaco_Model');
		$data['espacos'] = $this->Espaco_Model->getEspacos();
		$this->load->model('Equipamento_Model');
		$data['equipamentos'] = $this->Equipamento_Model->getEquipamentos();
		$data['quantidade'] = $this->Equipamento_Model->getQuantidadeEquipamento();
		$this->load->view('common/header');
		$this->load->view('common/nav');
		$this->load->view('reserva/cadastro',$data);
	}

	public function reserva_model(){
		
		$this->load->model('Reserva_Model','reservamodel');
		
		$resultado = $this->reservamodel->cadastro_reserva();
	
		redirect(base_url('/reserva_controller'));
			
	}

	public function cadastra_documento(){
		$this->load->model('Reserva_Model','reservamodel');
  		$this->reservamodel->cadastra_documento();
  	}


  	public function gera_pdf(){
 
  		//extract($_POST);
  		//var_dump($_GET[0]);
  		//exit;
 		$html = (string)$_GET[0];
  		
	  		// Instancia a classe mPDF
		$mpdf = new mPDF();
		// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
		// HTML dela para a variável $html
		//$html = $this->load->view('welcome_message','',TRUE);
		// Define um Cabeçalho para o arquivo PDF
		$mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
		// Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
		// página através da pseudo-variável PAGENO
		$mpdf->SetFooter('{PAGENO}');
		// Insere o conteúdo da variável $html no arquivo PDF
		$mpdf->writeHTML($html);
		// Cria uma nova página no arquivo
		$mpdf->AddPage();
		// Insere o conteúdo na nova página do arquivo PDF
		$mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
		// Gera o arquivo PDF
		$mpdf->Output();


  	}
	
}
