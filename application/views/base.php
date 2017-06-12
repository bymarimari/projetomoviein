<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie.in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link rel="stylesheet" href="<?= $this->public; ?>css/estilo.css">
    </head>
    
    <body>
        <nav class="white">
            <div class="nav-wrapper">
                <a href="<?= base_url(); ?>home"class="imglogo"></a>
                
                <a href="#" data-activates="mobile-demo" class="right button-collapse sanduiche"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!--<li class="search-btn bar"><a href="#"><i class="large material-icons">search</i></a></li>-->
                    <!--<li class="search-input"><input type="text" name="" placeholder="Buscar filmes" /></li>-->
                    <li class="bar"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="bar"><a href="<?= base_url(); ?>sobre">Sobre</a></li>
                    <li class="bar"><a href="<?= base_url(); ?>bancodefilmes">Banco de Filmes</a></li>
                    <li class="bar"><a href="<?= base_url(); ?>curiosidades">Curiosidades</a></li>
                    <li class="bar"><a href="<?= base_url(); ?>contato">Contato</a></li>
                    <?php if($this->session->has_userdata('usuario')) { 
                        $usuario = $this->session->userdata('usuario'); ?>
                        <li class="bar"><a class="dropdown-button" href="#!" data-activates="dropdown1">Olá, <?= $usuario['nome']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php } else { ?>
                        <a class="waves-effect waves-light btn red darken-4" href="#modalLogin">Login</a>
                    <?php } ?>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <?php if($this->session->has_userdata('usuario')) { 
                        $usuario = $this->session->userdata('usuario'); ?>
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Olá, <?= $usuario['nome']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                    <?php } else { ?>
                        <li><a href="#modalLogin">Login</a></li>
                    <?php } ?>
                    <li class="divider"></li>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="<?= base_url(); ?>sobre">Sobre</a></li>
                    <li><a href="<?= base_url(); ?>bancodefilmes">Banco de Filmes</a></li>
                    <li><a href="<?= base_url(); ?>curiosidades">Curiosidades</a></li>
                    <li><a href="<?= base_url(); ?>contato">Contato</a></li>
                    
                </ul>
            </div>
        </nav>
                <ul id="dropdown1" class="dropdown-content black-text">
             <?php if ($usuario['tipo'] == 1) { ?>
            <li><a class="black-text" href="<?= base_url().'meusfilmes'; ?>">Meus filmes</a></li>
            <?php } ?>
            <li><a class="black-text" href="<?= base_url().'usuario/logout'; ?>">Logout</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content black-text">
             <?php if ($usuario['tipo'] == 1) { ?>
            <li><a class="black-text" href="<?= base_url().'meusfilmes'; ?>">Meus filmes</a></li>
            <?php } ?>
            <li><a class="black-text" href="<?= base_url().'usuario/logout'; ?>">Logout</a></li>
        </ul>
        
        
        <main>
        	<?php $this->load->view($pagina); ?>
        </main>
        
        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5>Movie.in</h5>
                        <p>O seu Banco de Filmes online.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5>Links</h5>
                        <ul>
                            <li><a href="<?= base_url(); ?>">Home</a></li>
                            <li><a href="<?= base_url(); ?>sobre">Sobre</a></li>
                            <li><a href="<?= base_url(); ?>bancodefilmes">Banco de Filmes</a></li>
                            <li><a href="<?= base_url(); ?>curiosidades">Curiosidades</a></li>
                            <li><a href="<?= base_url(); ?>contato">Contato</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Movie.in © 2017 Todos os direitos reservados.
                </div>
            </div>
        </footer>
        
        <div id="modalLogin" class="modal">
            <form id="login" method="post" action="<?= base_url().'usuario/login'; ?>">
                <div class="modal-content">
                    <h4>Logar no sistema</h4>
                    <br>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" name="email" maxlength="70" value="exemplo@email.com" required>
                                <label for="email">E-mail</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" name="senha" maxlength="70" value="123456" required>
                                <label for="senha">Senha</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="modal-action btn-flat">Logar</button>
                    <a href="<?= base_url(); ?>cadastro" class="modal-action modal-close btn-flat">Cadastre-se</a>
                    <a href="#!" class="modal-action modal-close btn-flat">Cancelar</a>
                </div>
            </form>
        </div>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.carousel.carousel-slider').carousel({fullWidth: true});
                $(".button-collapse").sideNav();
                
                $('.search-btn').on('click', function(){
                    $('.search-btn').hide();
                    $('.search-input').show(500);
                });
             
                $('.modal').modal();
                $(".dropdown-button").dropdown();
                
                <?php if(empty($this->session->has_userdata('usuario'))) { ?>
                    $('form#login').on('submit', function(e){
                        e.preventDefault();
                        
                        var action = $(this).attr('action');
                        var email = $('#login input[name=email]').val();
                        var senha = $('#login input[name=senha]').val();
                        
                        $.ajax({
                            url: action,
                            type: 'post',
                            data: {email: email, senha: senha},
                            dataType: 'json',
                            success: function(data){
                                alert(data.mensagem);
                                
                                if (data.tipo == 'ok') {
                                    window.location = "<?= base_url().'bancodefilmes'; ?>";
                                }
                            }
                        });
                    });
                <?php } ?>
                
                
        </script>
    </body>
</html>