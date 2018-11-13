<?php

use common\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \common\models\User */

$this->title = 'iWorkflow';

$model = new User();
$usuario = $model->findByUsername(Yii::$app->user->identity->username);

$aluno = $usuario->aluno;
$professor = $usuario->professor;
$administrador = $usuario->administrador;

?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php
                if ($aluno){
                    echo '<div class="col-lg-4">
                                <h2>Aluno</h2>

                                <h2>Módulo do Aluno</h2>';
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['modaluno/index']).
                    '">Entrar</a></p>';
                    echo '</div>';
                }
            ?>   
            <?php
                if ($professor){
                    echo '<div class="col-lg-4">
                                <h2>Professor</h2>

                                <h2>Módulo do Professor</h2>';
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['modprofessor/index']).
                    '">Entrar</a></p>';
                    echo '</div>';
                }
            ?> 
            <?php
                if ($administrador){
                    echo '<div class="col-lg-4">
                                <h2>Administrador</h2>

                                <h2>Módulo do Administrador</h2>';
                    echo '<p><a class="btn btn-lg btn-success" href="'.
                    $caminho = $url = Url::to(['modadmin/index']).
                    '">Entrar</a></p>';
                    echo '</div>';
                }
            ?> 
        </div>

    </div>
</div>
