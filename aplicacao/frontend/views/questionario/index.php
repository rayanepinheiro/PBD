<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Pergunta;
use app\models\Resposta;

$this->title = 'iWorkflow';

?>
<div class="site-index">
    <div class="body-content">


            <?php
                $model = new Pergunta();
                $perguntas = $model->findPerguntasAtividade(Yii::$app->user->id);

                $model2 = new Resposta();

                echo '<h1>Questionário da Atividade</h1>';
                echo '<h3>Dê uma nota de 1 a 5:</h3>';
            ?>
                <table class="table table-striped table-bordered">
            <?php
                foreach ($perguntas as $value) {
                    echo '<tr>';
                    echo '<td>'. $value->pergunta .'</td>';

                    /*echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['projeto/detail']).'&id_projeto='.$value->id_projeto.
                    '">Entrar</a></p>';
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['projeto/overview']).'&id_projeto='.$value->id_projeto.
                    '">Overview</a></p>';
                    echo '</div>';*/
                      echo '</tr>';
                }

                /*echo '<div class="col-lg-4">';
                echo '<h2>Novo Projeto</h2>';
                echo '<p><a class="btn btn-lg btn-success" href="'.
                $caminho = $url = Url::to(['projeto/create']).
                '">+</a></p>';
                echo '</div>';*/
            ?>
        </table>
    </div>
</div>
