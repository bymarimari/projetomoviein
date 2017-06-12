<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <div class="container">
                <h3>Curiosidades</h3>
                
                
                 <?php $usuario = $this->session->userdata('usuario');
    if ($usuario['tipo'] == 2) { ?>
        <div class="row">
            <div class="col s12">
                <form class="enviar" enctype="multipart/form-data" action="<?= base_url().'curiosidades/inserir'; ?>">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input type="text" name="titulo" placeholder="Digite o seu titulo" maxlength="70" required>
                            <label for="titulo">Título</label>
                        </div>

                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn waves-effect waves-light red darken-4">
                                <span>Capa</span>
                                <input type="file" name="imagem" allowed="jpeg/png">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecione a imagem">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <textarea class="materialize-textarea" name="descricao" placeholder="Digite a curiosidade" maxlength="2000" data-length="2000"></textarea>
                            <label for="descricao">Informação</label>
                        </div>
                    </div>
                    <div class="row right-align">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
    
    <div class="row">

                <?php if(!empty($curiosidades)){
                    foreach($curiosidades as $curiosidade){ ?>
                    
                        <div class="noticia row">
                            <div class="noticia-imagem col s12 m3">
                                <img src="<?= $this->public; ?>img/curiosidades/<?= $curiosidade->imagem; ?>">
                            </div>
                            <div class="noticia-texto col s12 m9">
                                <h4><?= $curiosidade->titulo; ?></h4>
                                    <p><?= $curiosidade->descricao; ?></p>
                        
                         <?php if ($usuario['tipo'] == 2) { ?>
                    <a href="<?= base_url().'curiosidades/excluir'; ?>" class="excluir_curiosidade btn col s2 red darken-4tip" data-id="<?= $curiosidade->id_curiosidade; ?>">Excluir</a>
                <?php } ?>
            </div>
        
                            </div>
                <?php } } ?>
                
                        </div>
            </div>