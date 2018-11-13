<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Cursos;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpf')->widget(MaskedInput::className(), [
                    'mask' => '999.999.999-99', 'clientOptions' => ['removeMaskOnSubmit' => true,],
                ]) ?>

    <?= $form->field($model, 'senha')->passwordInput() ?>

    <?php echo $form->field($model, 'sexo')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino'],['prompt'=>'Escolher...']); ?>

    <?= $form->field($model, 'data_nascimento')->widget(
        DatePicker::className(), [
            'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd/mm/yyyy',
                'orientation' => 'bottom auto',
                'language' => 'pt-BR',
            ],
    ]);?>

    <?=
        $form->field($model, 'id_curso')->dropDownList(ArrayHelper::map(Cursos::find()->all(), 'id', 'nome_curso')); 
    ?> 

    <?= $form->field($model, 'aluno')->checkbox(); ?>

    <?= $form->field($model, 'professor')->checkbox(); ?>

    <?= $form->field($model, 'administrador')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
