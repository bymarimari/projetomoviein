<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
                <h3>Cadastro</h3>
                <p>Preencha todos os campos para realizar o cadastro</p>
                <br>
                <div class="row">
                    <div class="col s12">
                       <form action="<?= base_url(); ?>usuario/inserir" class="enviar">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input type="text" name="nome" placeholder="Digite o seu nome" maxlength="70" required ">
                                <label for="nome">Nome</label>
                            </div>
							<div class="input-field col s12 m6">
                                <input type="email" name="email"  placeholder="exemplo@email.com" maxlength="70" required>
                                <label for="email">E-mail</label>
                            </div>
							<div class="input-field col s12 m6">
                                <input type="password" name="senha" required>
                                <label for="password">Senha:</label>
                            </div>
                            
                        <div class="row right-align">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">Enviar
                                    <i class="material-icons right">send</i>
                                </button>
                                <button class="btn waves-effect waves-light red darken-4" type="reset" name="action">Limpar
                                    <i class="material-icons right">clear</i>
                                </button>
                        </div>
                    </form>
			 		</div>
