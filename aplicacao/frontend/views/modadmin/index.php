<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'iWorkflow';

?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Cadastro de Usuários</h2>

                <?php
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['user/index']).
                    '">Cadastrar</a></p>';
                ?>
            </div>

            <div class="col-lg-4">
                <h2>Cadastro de Cursos</h2>

                <?php
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['cursos/index']).
                    '">Cadastrar</a></p>';
                ?>
            </div>

            <div class="col-lg-4">
                <h2>Cadastro de Atividades</h2>

                <?php
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['atividades/index']).
                    '">Cadastrar</a></p>';
                ?>
            </div>

            <div class="col-lg-4">
                <h2>Cadastro de Práticas</h2>

                <?php
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['praticas/index']).
                    '">Cadastrar</a></p>';
                ?>
            </div>

            <div class="col-lg-4">
                <h2>Cadastro de Perguntas - Questionário</h2>

                <?php
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['pergunta/index']).
                    '">Cadastrar</a></p>';
                ?>
            </div>
        </div>
    </div>
</div>
