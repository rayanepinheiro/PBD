<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pergunta */

$this->title = 'Atualizar';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cadastro de Perguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pergunta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
