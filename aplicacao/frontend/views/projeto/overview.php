<?php

use yii\helpers\Html;
use app\models\ProjetoDetalhes;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PraticasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Overview';
$this->params['breadcrumbs'][] = ['label' => 'Módulo do Aluno', 'url' => ['modaluno/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="overview-index">

    <h1 style="align-self: center;">Nome do projeto: <?= $model->nome_projeto ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_projeto',
            'nome_projeto',
            'palavras_chave',
        ],
    ]) ?>

    <h1 style="align-self: center;">Atividades</h1>

    <?php
        $detalhes = ProjetoDetalhes::find()->where(['id_projeto' => $model->id_projeto])->all();
    ?>

    <?php
    foreach ($detalhes as $key) {
      echo
        DetailView::widget([
            'model' => $key,
            'attributes' => [
                'idAtividade.nome_titulo',
                'idAtividade.informacoes_atividade',
                'data_inicio_atividade',
                'data_fim_atividade',
                'aprovado',
                'id_arquivo_final',
            ],
        ]);
    }
      ?>
</div>
