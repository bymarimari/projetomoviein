<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <h3>Banco de Filmes</h3>
    
    <?php $usuario = $this->session->userdata('usuario');
    if ($usuario['tipo'] == 2) { ?>
        <div class="row">
            <div class="col s12">
                <form class="enviar" enctype="multipart/form-data" action="<?= base_url().'bancodefilmes/inserir'; ?>">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input type="text" name="titulo" placeholder="Digite o seu titulo" maxlength="70" required>
                            <label for="titulo">Título</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="genero" placeholder="Digite o gênero" maxlength="70" required>
                            <label for="genero">Gênero</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="text" name="ano" placeholder="Digite o ano" maxlength="4" required>
                            <label for="ano">Ano</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="number" name="nota" max="10.0" min="0.0" step="0.1" required>
                            <label for="nota">Nota</label>
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
                            <textarea class="materialize-textarea" name="descricao" placeholder="Digite a sinopse" maxlength="2000" data-length="2000"></textarea>
                            <label for="descricao">Sinopse</label>
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
          
        <?php if(!empty($bancodefilmes)){
        foreach($bancodefilmes as $filme){ ?>
            <div class="col s6 m3 filme center-align">
                <img class="filme_trigger" src="<?= $this->public; ?>img/filmes/<?= $filme->imagem; ?>" data-id="<?= $filme->id_filme; ?>">
                
                
                
                <?php if ($usuario['tipo'] == 2) { ?>
                    <a href="<?= base_url().'bancodefilmes/excluir'; ?>" class="excluir btn col s12 red darken-4tip" data-id="<?= $filme->id_filme; ?>">Excluir</a>
                <?php } ?>
            </div>
        <?php } } ?>
        
        
        
        
        
        
        <!-- Modal Structure -->
        <div id="modal_filme" class="modal">
            <div class="modal-content ">
                <h4 class="titulo"></h4>
                <p class="genero"></p>
                <p class="descricao"></p>
                <p class="nota"></p>
                <p class="ano"></p>
            </div>
            <div class="modal-footer">
                
                
                
                
                
                <?php if ($usuario['tipo'] == 1) { ?>
                <a href="<?= base_url().'bancodefilmes/adicionar'; ?>" data-id="" class="adicionar modal-action modal-close waves-effect waves-green btn-flat">Add ao Banco de Filmes</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
