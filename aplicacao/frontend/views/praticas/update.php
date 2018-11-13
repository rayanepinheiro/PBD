<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Praticas */

$this->title = 'Atualizar';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Cadastro de Práticas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praticas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
