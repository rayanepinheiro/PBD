<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Projetodetalhes;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Arquivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arquivos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'upload')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
