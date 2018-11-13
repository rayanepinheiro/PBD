<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoProjeto;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Atividades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id_tipo_projeto')->dropDownList(ArrayHelper::map(TipoProjeto::find()->all(), 'id', 'descricao_projeto')); ?>

    <?= $form->field($model, 'nome_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'informacoes_atividade')->textarea() ?>

    <?= $form->field($model, 'materiais_atividade')->textarea() ?>

    <?= $form->field($model, 'extensoes_permitidas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
