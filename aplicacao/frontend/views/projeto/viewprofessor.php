<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\ProjetoDetalhes;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PraticasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalhes do Projeto';
$this->params['breadcrumbs'][] = ['label' => 'Módulo do Professor', 'url' => ['modprofessor/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viewprofessor-index">

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
        //echo '<p><a class="btn btn-lg btn-success" href="">Baixar Arquivo</a></p>';
        echo '<p><a class="btn btn-lg btn-success" href="'.
        $caminho = $url = Url::to(['projeto/aprova']).'&id_projeto='.$key->id_projeto.'&id_atividade='.$key->id_atividade.
        '">Aprovar Etapa</a></p>';
    }
      ?>
</div>
