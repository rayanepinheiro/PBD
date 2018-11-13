<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerguntaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastro de Perguntas';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergunta-index">

  <h1 style="display: inline-block;"><?= Html::encode($this->title) ?></h1>

  <p style="display: inline-block; float: right;">
      <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <div style="clear: both;">
      <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pergunta',
            'id_atividade',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
          ],
        ],
    ]); ?>
</div>
