<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

            <div class="container">
                <h3>Curiosidades</h3>
                
                
               
    
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