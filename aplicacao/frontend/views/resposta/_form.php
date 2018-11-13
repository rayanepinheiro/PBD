<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resposta')->radioList(array(1=>'Um',2=>'Dois',3=>'Três', 4=>'Quatro', 5=>'Cinco'));?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
