<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curiosidades extends CI_Controller {
	public $public;
	
	public function __construct(){
		parent::__construct();
		$this->public = base_url().'public/';
	}
	
	public function index()
	{
		$dados = array();
		$dados['pagina'] = 'curiosidades';
		
		$this->load->model('Curiosidades_model');
		$dados['curiosidades'] = $this->Curiosidades_model->listar();
		
		
		$this->load->view('base', $dados);
	}
	
		public function get(){
			$id = $this->input->post('id', true);
			
			$this->load->model('Curiosidades_model');
			
			echo json_encode($this->Curiosidades_model->get($id));
		}
	
		public function inserir(){
		if ($this->session->has_userdata('usuario')) {
			$usuario = $this->session->userdata('usuario');
			if ($usuario['tipo'] == 2) {
				$this->load->model('Curiosidades_model');
				echo json_encode($this->Curiosidades_model->inserir($this->input->post(), $_FILES['imagem']));
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa ser administrador para executar esta ação! :P'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado como administrador para realizar esta ação! :P'));
		}
}

		public function excluir(){
				if ($this->session->has_userdata('usuario')) {
					$usuario = $this->session->userdata('usuario');
					
					if ($usuario['tipo'] == 2) {
						$this->load->model('Curiosidades_model');
						
					if ($this->Curiosidades_model->excluir($this->input->post('id'))) {
					echo json_encode(array('tipo' => 'ok', 'mensagem' => 'Excluído com sucesso!'));
					
				} else {
					echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Houve algum erro ao excluir esta curiosidade.'));
				}
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa ser administrador para executar esta ação! :P'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado como administrador para realizar esta ação! :P'));
		}
	}
}