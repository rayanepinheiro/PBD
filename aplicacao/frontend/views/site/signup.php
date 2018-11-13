<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use app\models\Cursos;

$this->title = 'Cadastrar';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os campos abaixo para acessar:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'nome')->textInput() ?>

                <?= $form->field($model, 'cpf')->widget(MaskedInput::className(), [
                    'mask' => '999.999.999-99', 'clientOptions' => ['removeMaskOnSubmit' => true,],
                ]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'repeat_password')->passwordInput() ?>

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

                <div class="form-group">
                    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
