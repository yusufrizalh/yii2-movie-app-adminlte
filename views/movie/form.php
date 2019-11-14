<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    $this->title = 'Add Movie';
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'description')->textArea() ?>

<div class="form-group">
    <?= Html::submitButton('Submit', [
        'class' => 'btn btn-primary'
    ])
    ?>
</div>
<?php ActiveForm::end(); ?>