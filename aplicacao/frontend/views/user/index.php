<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastro de Usuários';
$this->params['breadcrumbs'][] = ['label' => 'Módulo de Administrador', 'url' => ['modadmin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1 style="display: inline;"><?= Html::encode($this->title) ?></h1>

    <p style="display: inline; float: right;">
        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p></p>

    <div style="clear: both;">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'nome',
                'username',
                'cpf',
                //'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                // 'email:email',
                // 'status',
                // 'created_at',
                // 'updated_at',
                'data_nascimento',
                // 'sexo',
                // 'aluno',
                // 'professor',
                // 'administrador',
                // 'curso',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                ],
            ],
        ]); ?>
    </div>
</div>
