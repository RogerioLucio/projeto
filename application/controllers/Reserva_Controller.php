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
  		include('mpdf60/mpdf.php');
  		$html = "
		 <fieldset>
	 	<h1>Recibo</h1>
	 	<p class='center sub-titulo'>
	 		Nº <strong>0001</strong> - 
	 		VALOR <strong>R$ 500,00</strong>
	 	</p>
	 	<p>Recebi(emos) de <strong>Carlos Domingues Neto</strong></p>
	 	<p>a quantia de <strong>Quinhentos Reais</strong></p>
	 	<p>Correspondente a <strong>Serviços prestados ..<strong></p>
	 	<p>e para clareza firmo(amos) o presente.</p>
	 	<p class='direita'>São Roque, 25 de Dezembro de 2015</p>
	 	<p>Assinatura ......................................................................................................................................</p>
	 	<p>Nome <strong>João da Silva Nogueira</strong> CPF/CNPJ: <strong>222.222.222-02</strong></p>
	 	<p>Endereço <strong>Rua da Penha, 200 - Jd. Alguma Coisa - São Paulo</strong></p>
	 </fieldset>";
 
	$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("css/estilo.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
 
	exit;

  	}
	
}
