<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Projeto */

$this->title = 'Aprova';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Aluno', 'url' => ['modaluno/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('viewprofessor'.'&id_projeto=', [
        'model' => $model,
    ]);
    ?>

</div>
