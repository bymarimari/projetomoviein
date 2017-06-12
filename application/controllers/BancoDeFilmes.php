<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BancoDeFilmes extends CI_Controller {
	public $public;
	
	public function __construct(){
		parent::__construct();
		$this->public = base_url().'public/';
	}
	
	public function index()
	{
		$dados = array();
		$dados['pagina'] = 'bancodefilmes';

		
		$this->load->model('Filmes_model');
		$dados['bancodefilmes'] = $this->Filmes_model->listar();
		
		$this->load->view('base', $dados);
	}
	
	public function get(){
		$id = $this->input->post('id', true);
		
		$this->load->model('Filmes_model');
		
		echo json_encode($this->Filmes_model->get($id));
	}
	
	public function inserir(){
		if ($this->session->has_userdata('usuario')) {
			$usuario = $this->session->userdata('usuario');
			if ($usuario['tipo'] == 2) {
				$this->load->model('Filmes_model');
				echo json_encode($this->Filmes_model->inserir($this->input->post(), $_FILES['imagem']));
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa ser administrador para executar esta ação! :P'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado como administrador para realizar esta ação! :P'));
		}
	}

	public function excluir()
			{
				if ($this->session->has_userdata('usuario')) {
					$usuario = $this->session->userdata('usuario');
					
					if ($usuario['tipo'] == 2) {
						$this->load->model('Filmes_model');
						
					if ($this->Filmes_model->excluir($this->input->post('id'))) {
					echo json_encode(array('tipo' => 'ok', 'mensagem' => 'Excluído com sucesso!'));
					
				} else {
					echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Houve algum erro ao excluir este filme.'));
				}
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa ser administrador para executar esta ação! :P'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado como administrador para realizar esta ação! :P'));
		}
	}

	
	public function adicionar()
	{
		if ($this->session->has_userdata('usuario')) {
			$usuario = $this->session->userdata('usuario');
			
			if ($usuario['tipo'] == 1) {
				$this->load->model('Filmes_model');
				
				if ($this->Filmes_model->adicionar($this->input->post('id'), $usuario['email'])) {
					echo json_encode(array('tipo' => 'ok', 'mensagem' => 'Adicionado com sucesso!'));
				} else {
					echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Houve algum erro ao adicionar este filme.'));
				}
			} else {
				echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa ser um usuário cadastrado para executar esta ação! :P'));
			}
		} else {
			echo json_encode(array('tipo' => 'fail', 'mensagem' => 'Você precisa estar logado para realizar esta ação! :P'));
		}
	}
}
