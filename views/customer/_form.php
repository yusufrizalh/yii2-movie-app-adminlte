<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
// menambahkan Yii2 widget: SwitchInput
use kartik\widgets\SwitchInput;

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

<!--
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'created_at')->textInput() ?>
    <?= $form->field($model, 'updated_at')->textInput() ?>
    <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'role')->dropDownList([ 'member' => 'Member', 'admin' => 'Admin', ], ['prompt' => '']) ?>
-->
    
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'role')->dropDownList(['admin' => 'Admin', 'customer' => 'Customer'], 
                                                  ['prompt' => '']) ?>
    <?=
        $form->field($model, 'status')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX, 
            'pluginOptions' => [
                'handleWidth' => 60, 
                'onText' => 'Active', 
                'offText' => 'Disabled'
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
