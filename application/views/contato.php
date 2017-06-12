<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <h3>Contato</h3>
    <p>Gostaria de entrar em contato conosco? Nos deixe uma mensagem ;)</p>
    <br>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input type="text" name="nome" placeholder="Digite o seu nome" maxlength="70" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="email" name="email" placeholder="exemplo@email.com" maxlength="70" required>
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="assunto" placeholder="Digite o assunto" maxlength="100" required>
                    <label for="assunto">Assunto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="mensagem" placeholder="Digite sua mensagem" maxlength="2000" data-length="2000"></textarea>
                    <label for="assunto">Assunto</label>
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