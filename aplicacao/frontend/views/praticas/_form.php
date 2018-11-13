<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Atividades;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Praticas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="praticas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id_atividade')->dropDownList(ArrayHelper::map(Atividades::find()->all(), 'id', 'nome_titulo'), ['prompt' => 'Escolha...']); ?>

    <?= $form->field($model, 'descricao_pratica')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
