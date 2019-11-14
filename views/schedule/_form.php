<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form yii\widgets\ActiveForm */

// dropDownList dari table movie 
use \yii\helpers\ArrayHelper;
use \app\models\Movie;

// masking input via widget 
use \yii\widgets\MaskedInput;

// menambahkan Yii2 widget: Select2
use kartik\widgets\Select2;
// menambahkan Yii2 widget: DatePicker    
use kartik\widgets\DateTimePicker;
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'movie_id')->textInput() ?>-->
    <!-- tambahan dropDownList dari table -->
<!--
    <?php
        $movies = ArrayHelper::map(Movie::find()->all(),'id', 'title');
        echo $form->field($model, 'movie_id')->dropDownList($movies, ['prompt' => '- Pilih Judul -']);
    ?>
-->
    
    <?php 
        $movies = ArrayHelper::map(Movie::find()->all(),'id', 'title');
        echo $form->field($model, 'movie_id')->widget(Select2::classname(), [
            'data' => $movies, 
            'options' => ['placeholder' => 'Pilih Judul Film'], 
            'pluginOptions' => [
                'allowClear' => true, 
            ], 
        ]);
    ?>

    <!--<?= $form->field($model, 'start')->textInput() ?>-->
    <!-- tambahan maskedInput dari widget -->
<!--
    <?php
        echo $form->field($model, 'start')->widget(MaskedInput::classname(), ['mask' => '9999-99-99 99:99:99']);
    ?>
-->
    
    <!-- tambahkan datepicker dari widget -->
    <?=
        $form->field($model, 'start')->widget(DateTimePicker::classname(), [
            'options' => [
                'placeholder' => 'Tuliskan start time'
            ], 
            'language' => 'id', 
            'pluginOptions' => [
                'autoClose' => true, 
                'format' => 'yyyy-mm-dd hh:ii:ss', 
                'todayHighlight' => true, 
                'todayBtn' => true,
            ]
        ]);
    ?>

    <?= $form->field($model, 'room')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quota')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
