<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastro de Cursos';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-index">

    <h1 style="display: inline;"><?= Html::encode($this->title) ?></h1>

    <p style="float: right; display: inline;">
        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p></p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'nome_curso',
            'sigla_curso',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
            ],
        ],
    ]); ?>
</div>
