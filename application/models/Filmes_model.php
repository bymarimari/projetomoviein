<?php

class Filmes_model extends CI_Model{
    
    
    
    public function get($id){
        return $this->db->get_where('filme', array('id_filme' => $id))->row();
    }
    
    public function inserir($dados, $imagem){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('titulo', 'Título', 'max_length[70]');
		$this->form_validation->set_rules('genero', 'Gênero', 'max_length[70]');
		$this->form_validation->set_rules('ano', 'Ano', 'max_length[4]|numeric');
		$this->form_validation->set_rules('nota', 'Nota', 'max_length[5]');
		
		if ($this->form_validation->run()) {
		    
		    if (!empty($imagem)) {
		        $this->load->library('upload');
		        $config = array();
		        $config['upload_path'] = FCPATH.'public/img/filmes/';
    			$config['allowed_types'] = 'jpg|jpeg|png';
		        $config['file_name'] = time();
		        $config['file_ext_tolower'] = TRUE;
		        $this->upload->initialize($config);
		        
		        if ($this->upload->do_upload('imagem')) {
		            $imagem = $this->upload->data();
		            $dados['imagem'] = $imagem['file_name'];
		            
    				$this->load->library('image_moo');
    			    $this->image_moo->load($config['upload_path'].$dados['imagem'])->resize_crop(190,280)->set_jpeg_quality(100)->save_pa('', '', TRUE);
        		    
        		    $this->db->set($dados);
        		    
        		    if ($this->db->insert('filme')) {
		                return array('tipo' => 'ok', 'mensagem' => 'Inserido com sucesso!');
        		    } else {
        		        return array('tipo' => 'fail', 'mensagem' => 'Houve um erro ao salvar os dados');
        		    }
		        } else {
		            return array('tipo' => 'fail', 'mensagem' => $this->upload->display_errors());
		        }
		    } else {
		        return array('tipo' => 'fail', 'mensagem' => 'É necessário o envio da imagem.');
		    }
		} else {
		    return array('tipo' => 'fail', 'mensagem' => $this->form_validation->error_string('',''));
		}
    }