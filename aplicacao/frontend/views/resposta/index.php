<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ProjetoDetalhes;
use app\models\Atividades;
use app\models\Pergunta;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespostaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questionário';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_atividade',
            //'id_pergunta',
            'pergunta',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
