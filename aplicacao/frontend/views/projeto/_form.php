<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Projeto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projeto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_projeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao_projeto')->textarea() ?>

    <?= $form->field($model, 'palavras_chave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?php

    $modelo = User::findUsuario(Yii::$app->user->id);
    ?>

    <?php echo $form->field($model, 'id_usuario')->dropDownList([$modelo->id => $modelo->nome]); ?>

    <?php
        $professor = User::findProfessores();
        $lista = [];

        foreach ($professor as $key) {
            $lista = $lista + [$key->id => $key->nome];
        }
    ?>

    <?php echo $form->field($model, 'id_professor')->dropDownList($lista, ['prompt' => 'Escolha...']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
