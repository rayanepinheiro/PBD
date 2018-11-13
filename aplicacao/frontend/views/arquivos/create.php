<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Arquivos */

$this->title = 'Create Arquivos';
$this->params['breadcrumbs'][] = ['label' => 'Arquivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arquivos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
