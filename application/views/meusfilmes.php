<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <h3>Meus Filmes</h3>
    
     <div class="row">
          
        <?php if(!empty($assistes)){
        foreach($assistes as $assiste){ ?>
            <div class="col s6 m3 filme center-align">
                <img class="filme_trigger" src="<?= $this->public; ?>img/filmes/<?= $assiste->filme->imagem; ?>" data-id="<?= $assiste->filme->id_filme; ?>">
                <a href="<?= base_url().'meusfilmes/excluir'; ?>" class="excluir btn col s12 red darken-4tip" data-id="<?= $assiste->filme->id_filme; ?>">Excluir</a>
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
         </div>
    </div>
</div>