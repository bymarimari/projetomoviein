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