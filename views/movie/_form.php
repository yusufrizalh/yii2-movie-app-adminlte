<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movie-form">

    <?php $form = ActiveForm::begin(); ?>
        
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!--<?= $form->field($model, 'genre')->textInput(['maxlength' => true]) ?>-->
    <?= $form->field($model, 'genre')->dropDownList(['Horor' => 'Horor', 'Drama Komedi' => 'Drama Komedi', 'Action' => 'Action', ], ['prompt' => '-Pilih Genre-']) ?>
    
    <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>
    
    <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>
    
    <!--  modifikasi  -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
