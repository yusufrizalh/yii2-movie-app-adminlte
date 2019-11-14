<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use \yii\helpers\ArrayHelper;
use \app\models\Movie;

// menambahkan Yii2 widget: SwitchInput
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true], ['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'born')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'birth_day')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'gender')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX, 
            'pluginOptions' => [
                'handleWidth' => 60,
                'onText' => 'Pria', 
                'offText' => 'Wanita'
            ]
        ]);
    ?>
    
<!--
    <?= $form->field($model, 'gender')->dropDownList(['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], 
                                                    ['prompt' => '- Pilih Gender -']) ?>
-->
    
    <!--<?= $form->field($model, 'gender')->radioList(['Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan']) ?>-->

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <!--<?= $form->field($model, 'hobby')->listBox([1 => 'Coding', 2 => 'Reading', 3 => 'Cycling'], ['multiple' => true]) ?>-->
    
    <?= $form->field($model, 'hobby')->checkBoxList(['Coding' => 'Coding', 'Reading' => 'Reading', 'Cycling' => 'Cycling'], ['multiple' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
