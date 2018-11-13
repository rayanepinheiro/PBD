<?php

use yii\helpers\Html;
use app\models\ProjetoDetalhes;
use app\models\Atividades;
use yii\widgets\DetailView;
use kato\DropeZone;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PraticasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Etapa Atual';
$this->params['breadcrumbs'][] = ['label' => 'Módulo do Aluno', 'url' => ['modaluno/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="overview-index">

    <?php
        $atividades = $model->getDetalhes($model->id_projeto);
        $quantidade_atividades = count($atividades);
        $contador = 1;
        $atividade_atual = 1;
        //$atividade_codigo = $atividades[0];

        foreach ($atividades as $key) {

                if ($key->data_fim_atividade != 0){
                    if ($contador == $quantidade_atividades) {
                      $atividade_codigo = $key->id_atividade;
                      break;
                    }

                    $contador++;
                    $atividade_atual = $contador;
                } else {
                  $atividade_codigo = $key->id_atividade;
                  break;
                }



            }

        $atividade_detalhe = Atividades::find()->where(['id' => $atividade_codigo])->one();
    ?>

    <div>
        <div id="topo">
            <?php
                for ($contador=1; $contador <= $quantidade_atividades ; $contador++) {
                    if ($contador == $atividade_atual){
                        echo '<h1 style="display: inline-block; float: left; margin: 10px;">'.$contador.'</h1>';
                    }else{
                        echo '<h3 style="display: inline-block; float: left; margin: 10px;">'.$contador.'</h3>';
                    }
                }
            ?>
        </div>

        <p></p>

        <div style="clear: both;">
            <?php
                echo '<h1>Atividade '.$atividade_atual.' - '.$atividade_detalhe->nome_titulo.'</h1>';

                echo '<p></p>';

                /*echo '<h4>'.$atividade_detalhe->informacoes_atividade.'</h4>';

                echo '<p></p>';

                echo $atividade_detalhe->materiais_atividade;*/

                echo DetailView::widget([
                  'model' => $atividade_detalhe, 'attributes' => [
                    'informacoes_atividade',
                    'materiais_atividade',
                    'extensoes_permitidas'],
                ]);
             ?>
        </div>
        <div>
        <?php // $this->render('upload') ?>
        </div>
        <h1></h1>
    </div>
</div>
