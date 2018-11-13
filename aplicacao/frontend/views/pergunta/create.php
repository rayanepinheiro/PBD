<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pergunta */

$this->title = 'Cadastrar';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cadastro de Práticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergunta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
