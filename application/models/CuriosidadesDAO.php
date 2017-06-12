<?php

class CuriosidadesDAO extends CI_Model{
    private $tabela;
    private $id_tabela;
    private $campos;
    
    public function __construct(){
        $this->tabela = 'curiosidade';
        $this->id_tabela = 'id_'.$this->tabela;
        $this->campos = array();
    }
    
    public function set($dados){
        //se o $dados['titulo'] não estiver vazio, então $this->campos['titulo'] = $dados['titulo'], senão $this->campos['titulo'] = $this->campos['titulo'],
        $this->campos['titulo'] = !empty($dados['titulo']) ? $dados['titulo'] : $this->campos['titulo'];
        $this->campos['descricao'] = !empty($dados['descricao']) ? $dados['descricao'] : $this->campos['descricao'];
        $this->campos['imagem'] = !empty($dados['imagem']) ? $dados['imagem'] : $this->campos['imagem'];
    }
    
     public function find($id){
        $this->campos = (array) $this->db->get_where($this->tabela, array($this->id_tabela => $id))->row();
    }

    public function get(){
        return $this->campos;
    }

    public function listar(){
        return $this->db->get_where($this->tabela)->result();
    }

    public function salvar(){
        $this->db->set(array('titulo' => $this->campos['titulo'], 'descricao' => $this->campos['descricao'], 'imagem' => $this->campos['imagem']));
        return empty($this->campos[$this->id_tabela]) ? $this->db->insert($this->tabela) : $this->db->update($this->tabela);
    }

    public function deletar(){
        return $this->db->delete($this->tabela, array($this->id_tabela => $this->campos[$this->id_tabela]));
    }
}
