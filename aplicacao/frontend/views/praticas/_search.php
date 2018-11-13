<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Atividades;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PraticasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="praticas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'id_atividade')->dropDownList(ArrayHelper::map(Atividades::find()->all(), 'id', 'nome_titulo'), ['prompt' => 'Escolha...']); ?>

    <?= $form->field($model, 'descricao_pratica') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
