<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use app\models\Projeto;

$this->title = 'iWorkflow';

?>
<div class="site-index">
    <div class="body-content">

        <div class="row">

            <?php
                $model = new Projeto();
                $projetos = $model->findProjetosProfessor(Yii::$app->user->id);

                foreach ($projetos as $value) {
                    echo '<div class="col-lg-4">';
                    echo '<h2>'. $value->nome_projeto .'</h2>';
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['projeto/viewprofessor']).'&id_projeto='.$value->id_projeto.
                    '">Overview</a></p>';
                    echo '</div>';
                }

                /*echo '<div class="col-lg-4">';
                echo '<h2>Novo Projeto</h2>';
                echo '<p><a class="btn btn-lg btn-success" href="'.
                $caminho = $url = Url::to(['projeto/create']).
                '">+</a></p>';
                echo '</div>';*/
            ?>
        </div>
    </div>
</div>
